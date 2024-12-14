<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        // Buat instance Guzzle
        $client = new Client();
        $page = request('page', 1);
        $categories = request('category');
        $tags = request('tag');

        // Ambil data artikel dari API WordPress
        $response = $client->get(
            'https://cms.ptgis.id/wp-json/wp/v2/posts',
            [
                'query' => [
                    'per_page' => 3,
                    'categories' => $categories,
                    'tags' => $tags,
                    'page' => $page

                ]
            ]
        );

        // Proses pagination

        // dd($response);
        $articles = json_decode($response->getBody(), true);

        $currentPage = request()->input('page', 1);
        $totalArticles = $response->getHeaderLine('X-WP-Total'); // Total artikel
        $totalPages = $response->getHeaderLine('X-WP-TotalPages'); // Total artikel
        $previousPage = $currentPage - 1;
        $nextPage = $currentPage + 1;
        // Menentukan halaman yang akan ditampilkan di pagination
        $pagesToShow = 1; // Menampilkan 2 halaman sebelumnya dan 2 halaman berikutnya
        $startPage = max(1, $currentPage - $pagesToShow); // Halaman mulai
        $endPage = min($totalPages, $currentPage + $pagesToShow); // Halaman akhir

        // Ambil semua kategori sekaligus
        $categoriesResponse = $client->get('https://cms.ptgis.id/wp-json/wp/v2/categories');
        $allCategories = json_decode($categoriesResponse->getBody(), true);
        $categoriesMap = [];
        foreach ($allCategories as $category) {
            $categoriesMap[$category['id']] = $category['name'];
        }

        // Ambil semua tag sekaligus
        $tagsResponse = $client->get('https://cms.ptgis.id/wp-json/wp/v2/tags');
        $allTags = json_decode($tagsResponse->getBody(), true);
        $tagsMap = [];
        foreach ($allTags as $tag) {
            $tagsMap[$tag['id']] = $tag['name'];
        }

        // dd($tagsMap, $categoriesMap, $articles);

        // Proses setiap artikel
        $processedArticles = array_map(function ($article) use ($client, $categoriesMap, $tagsMap) {
            // Default thumbnail
            $thumbnail = null;

            // Ambil featured media jika ada
            if (!empty($article['featured_media'])) {
                $mediaResponse = $client->get("https://cms.ptgis.id/wp-json/wp/v2/media/{$article['featured_media']}");
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
                // 'content' => $article['content']['rendered'],
                'excerpt' => $article['excerpt']['rendered'],
                'thumbnail' => $thumbnail,
                'categories' => $categories,
                'tags' => $tags,
                'slug' => $article['slug'],
                'date' => $article['date']
            ];
        }, $articles);

        // Debug hasil data yang diproses (hapus ini di production)
        // dd($processedArticles);
        return view('components.articles', [
            'articles' => $processedArticles,
            'categories' => $categoriesMap,
            'tags' => $tagsMap,
            'currentPage' => $currentPage,
            'previousPage' => $previousPage,
            'nextPage' => $nextPage,
            'totalPages' => $totalPages,
            'totalArticles' => $totalArticles,
            'startPage' => $startPage,
            'endPage' => $endPage
            // 'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
