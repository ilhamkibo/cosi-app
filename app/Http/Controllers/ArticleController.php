<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

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
            $response = $client->get("https://cosi.web.id/wp-json/wp/v2/posts", [
                'query' => ['slug' => $slug],
            ]);

            $articles = json_decode($response->getBody(), true);

            if (empty($articles)) {
                abort(404, 'Artikel tidak ditemukan.');
            }

            $article = $articles[0]; // Ambil artikel pertama

            // Ambil semua kategori dan tag secara paralel
            $tagsResponse = $client->get("https://cosi.web.id/wp-json/wp/v2/tags");
            $categoriesResponse = $client->get("https://cosi.web.id/wp-json/wp/v2/categories");

            $tags = json_decode($tagsResponse->getBody(), true);
            $categories = json_decode($categoriesResponse->getBody(), true);
            // dd($tags, $categories, $article);
            // Ambil nama tag berdasarkan ID
            $article['tags'] = $this->mapNamesByIds($article['tags'] ?? [], $tags);
            // Ambil nama kategori berdasarkan ID
            $article['categories'] = $this->mapNamesByIds($article['categories'] ?? [], $categories);
            // dd($article['tags'], $article['categories'], $categories, $tags);

            // Ambil thumbnail
            $article['thumbnail'] = $this->getThumbnail($client, $article['featured_media'] ?? null);

            // Ambil rekomendasi artikel
            $relatedResponse = $client->get("https://cosi.web.id/wp-json/wp/v2/posts", [
                'query' => [
                    'exclude' => [$article['id']], // Kecualikan artikel saat ini
                    'per_page' => 4, // Batasi 4 artikel
                    'orderby' => 'date',
                    'order' => 'desc'
                ]
            ]);
            $relatedArticles = json_decode($relatedResponse->getBody(), true);
            $products = ProductCategory::all();
            // Tambahkan thumbnail untuk setiap artikel terkait
            foreach ($relatedArticles as &$relatedArticle) {
                $relatedArticle['thumbnail'] = $this->getThumbnail($client, $relatedArticle['featured_media'] ?? null);
                $relatedArticle['tags'] = $this->mapNamesByIds($relatedArticle['tags'] ?? [], $tags);
                $relatedArticle['categories'] = $this->mapNamesByIds($relatedArticle['categories'] ?? [], $categories);
            }
            // dd($relatedArticles, $products);

            return view('components.article', [
                'article' => $article,
                'relatedArticles' => $relatedArticles,
                'products' => $products
            ]);
        } catch (RequestException $e) {
            // Tangani kesalahan permintaan HTTP

            $errorMessage = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
            abort(404, "Terjadi kesalahan: $errorMessage");
        } catch (\Exception $e) {
            // Tangani error lainnya
            abort(404, 'Terjadi kesalahan saat mengambil artikel.');
        }
    }

    /**
     * Helper function untuk memetakan ID ke nama berdasarkan koleksi data.
     *
     * @param array $ids
     * @param array $items
     * @return array
     */
    private function mapNamesByIds(array $ids, array $items): array
    {
        // Buat peta ID ke nama
        $idToNameMap = array_column($items, 'name', 'id');

        // Ambil nama berdasarkan ID
        return array_map(function ($id) use ($idToNameMap) {
            return $idToNameMap[$id] ?? null;
        }, $ids);
    }


    /**
     * Helper function untuk mendapatkan URL thumbnail.
     *
     * @param Client $client
     * @param int|null $mediaId
     * @return string|null
     */
    private function getThumbnail(Client $client, ?int $mediaId): ?string
    {
        if (!$mediaId) {
            return null;
        }

        try {
            $response = $client->get("https://cosi.web.id/wp-json/wp/v2/media/{$mediaId}");
            $media = json_decode($response->getBody(), true);
            return $media['source_url'] ?? null;
        } catch (RequestException $e) {
            return null; // Jika gagal, kembalikan null
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
