<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AdminArticleController extends Controller
{
    public function index()
    {
        // Buat instance Guzzle
        $client = new Client();
        $page = request('page', 1);
        $categories = request('category');
        $tags = request('tag');

        try {
            // Ambil data artikel dari API WordPress
            $response = $client->get(
                'https://cosi.web.id/wp-json/wp/v2/posts',
                [
                    'query' => [
                        'per_page' => 9,
                        'categories' => $categories,
                        'tags' => $tags,
                        'page' => $page
                    ]
                ]
            );

            $articles = json_decode($response->getBody(), true);
            $totalArticles = $response->getHeaderLine('X-WP-Total');
        } catch (\Exception $e) {
            // Jika error terjadi, tampilkan halaman kosong
            return view('components.articles', [
                'articles' => [],
                'categories' => [],
                'tags' => [],
                'currentPage' => $page,
                'previousPage' => max(1, $page - 1),
                'nextPage' => $page + 1,
                'totalPages' => 0,
                'totalArticles' => 0,
                'startPage' => 1,
                'endPage' => 1
            ]);
        }

        // Ambil semua kategori
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
                'id' => $article["id"],
                'title' => $article['title']['rendered'],
                'excerpt' => $article['excerpt']['rendered'],
                'thumbnail' => $thumbnail,
                'categories' => $categories,
                'tags' => $tags,
                'slug' => $article['slug'],
                'date' => Carbon::parse($article['date'])
            ];
        }, $articles);


        return view('components.admin-page.article.admin-articles', [
            'articles' => $processedArticles,
            'categories' => $categoriesMap,
            'tags' => $tagsMap,
            'totalArticles' => $totalArticles,

        ]);
    }
}
