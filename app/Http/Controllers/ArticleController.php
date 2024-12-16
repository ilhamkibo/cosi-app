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

        try {
            // Ambil data artikel dari API WordPress
            $response = $client->get(
                'https://cms.ptgis.id/wp-json/wp/v2/posts',
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
            $totalPages = $response->getHeaderLine('X-WP-TotalPages');
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
        $categoriesResponse = $client->get('https://cms.ptgis.id/wp-json/wp/v2/categories');
        $allCategories = json_decode($categoriesResponse->getBody(), true);
        $categoriesMap = [];
        foreach ($allCategories as $category) {
            $categoriesMap[$category['id']] = $category['name'];
        }

        // Ambil semua tag
        $tagsResponse = $client->get('https://cms.ptgis.id/wp-json/wp/v2/tags');
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
                'excerpt' => $article['excerpt']['rendered'],
                'thumbnail' => $thumbnail,
                'categories' => $categories,
                'tags' => $tags,
                'slug' => $article['slug'],
                'date' => $article['date']
            ];
        }, $articles);

        // Tentukan pagination
        $currentPage = $page;
        $previousPage = max(1, $currentPage - 1);
        $nextPage = $currentPage + 1;
        $pagesToShow = 1; // Menampilkan 1 halaman sebelumnya dan berikutnya
        $startPage = max(1, $currentPage - $pagesToShow);
        $endPage = min($totalPages, $currentPage + $pagesToShow);

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
    public function show(string $slug)
    {
        $client = new Client();

        try {
            // Ambil artikel berdasarkan slug
            $response = $client->get("https://cms.ptgis.id/wp-json/wp/v2/posts", [
                'query' => ['slug' => $slug],
            ]);

            $articles = json_decode($response->getBody(), true);

            if (empty($articles)) {
                // Jika artikel tidak ditemukan, lempar 404
                abort(404, 'Artikel tidak ditemukan.');
            }

            $article = $articles[0]; // Ambil artikel pertama (slug harus unik)

            // Ambil semua tags
            $tagsResponse = $client->get("https://cms.ptgis.id/wp-json/wp/v2/tags");
            $tags = json_decode($tagsResponse->getBody(), true);

            // Ambil tag names berdasarkan IDs
            $article['tags'] = isset($article['tags']) && is_array($article['tags'])
                ? array_map(fn($id) => $tags[array_search($id, array_column($tags, 'id'))]['name'] ?? null, $article['tags'])
                : [];

            // Ambil semua kategori
            $categoriesResponse = $client->get("https://cms.ptgis.id/wp-json/wp/v2/categories");
            $categories = json_decode($categoriesResponse->getBody(), true);

            // Ambil category names berdasarkan IDs
            $article['categories'] = isset($article['categories']) && is_array($article['categories'])
                ? array_map(fn($id) => $categories[array_search($id, array_column($categories, 'id'))]['name'] ?? null, $article['categories'])
                : [];

            // Ambil thumbnail
            $article['thumbnail'] = null;
            if (!empty($article['featured_media'])) {
                $mediaResponse = $client->get("https://cms.ptgis.id/wp-json/wp/v2/media/{$article['featured_media']}");
                $media = json_decode($mediaResponse->getBody(), true);
                $article['thumbnail'] = $media['source_url'] ?? null;
            }

            // Debugging
            // dd($article);

            return view('components.article', [
                'article' => $article
            ]);
        } catch (\Exception $e) {
            // Tangani error
            abort(404, 'Terjadi kesalahan saat mengambil artikel.');
        }
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
