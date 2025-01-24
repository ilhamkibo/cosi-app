<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AdminHomeController extends Controller
{
    public function index()
    {
        $client = new Client();

        try {
            // Ambil jumlah total artikel dari API WordPress
            $response = $client->get('https://cosi.web.id/wp-json/wp/v2/posts', [
                'query' => ['per_page' => 1], // Hanya ambil 1 artikel untuk mendapatkan header
            ]);
            $totalArticles = $response->getHeaderLine('X-WP-Total');
        } catch (\Exception $e) {
            $totalArticles = 0; // Jika terjadi kesalahan
        }

        // Ambil semua kategori dan jumlah artikel per kategori
        try {
            // Ambil semua kategori dengan jumlah artikel (_embed sudah menyertakan data tambahan)
            $categoriesResponse = $client->get('https://cosi.web.id/wp-json/wp/v2/categories?_embed');
            $allCategories = json_decode($categoriesResponse->getBody(), true);

            // Proses setiap kategori
            $categoriesCount = array_map(function ($category) {
                return [
                    'name' => $category['name'],
                    'count' => $category['count'], // 'count' diambil langsung dari response kategori
                ];
            }, $allCategories);
        } catch (\Exception $e) {
            $categoriesCount = []; // Default jika terjadi kesalahan
        }

        $categories = ProductCategory::withCount('product')->get();
        $totalProducts = $categories->sum('product_count');

        // dd($categories, $totalProducts, $categoriesCount, $totalArticles);

        return view('components.admin-page.admin-home', compact('totalProducts', 'categories', 'categoriesCount', 'totalArticles'));
    }
}
