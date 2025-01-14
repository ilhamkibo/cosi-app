<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class HomeController extends Controller
{
    public function index()

    {
        $partners = Partner::all();

        $client = new Client();
        try {
            // Ambil data artikel dari API WordPress
            $response = $client->get(
                'https://cosi.web.id/wp-json/wp/v2/posts',
                [
                    'query' => [
                        'per_page' => 4
                    ]
                ]
            );

            $articles = json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            // Tangani kesalahan permintaan HTTP

            $errorMessage = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
            abort(404, "Terjadi kesalahan: $errorMessage");
        } catch (\Exception $e) {
            // Tangani error lainnya
            abort(404, 'Terjadi kesalahan saat mengambil artikel.');
        }

        $categoriesResponse = $client->get('https://cosi.web.id/wp-json/wp/v2/categories');
        $allCategories = json_decode($categoriesResponse->getBody(), true);
        $categoriesMap = [];
        foreach ($allCategories as $category) {
            $categoriesMap[$category['id']] = $category['name'];
        }

        // Ambil semua tag
        $tagsResponse = $client->get('https://cosi.web.id/wp-json/wp/v2/tags');
        $allTags = json_decode($tagsResponse->getBody(), true);
        $tagsMap = [];
        foreach ($allTags as $tag) {
            $tagsMap[$tag['id']] = $tag['name'];
        }

        // Proses setiap artikel
        $processedArticles = array_map(function ($article) use ($client, $categoriesMap, $tagsMap) {
            // Default thumbnail
            $thumbnail = null;

            // Ambil featured media jika ada
            if (!empty($article['featured_media'])) {
                $mediaResponse = $client->get("https://cosi.web.id/wp-json/wp/v2/media/{$article['featured_media']}");
                $media = json_decode($mediaResponse->getBody(), true);
                $thumbnail = $media['source_url'] ?? null;
            }

            // Ambil kategori
            $categories = array_map(fn($id) => $categoriesMap[$id] ?? '', $article['categories'] ?? []);

            // Ambil tag
            $tags = array_map(fn($id) => $tagsMap[$id] ?? '', $article['tags'] ?? []);

            // Return data artikel
            return [
                'title' => $article['title']['rendered'],
                'excerpt' => $article['excerpt']['rendered'],
                'thumbnail' => $thumbnail,
                'categories' => $categories,
                'tags' => $tags,
                'slug' => $article['slug'],
                'date' => $article['date']
            ];
        }, $articles);


        // dd($processedArticles);
        return view('components.home', [
            'partners' => $partners,
            'articles' => $processedArticles
        ]);
    }
}
