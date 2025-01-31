<?php

namespace App\Http\Controllers;

use App\Models\CollectionProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        $collections = CollectionProduct::all();
        return view('components.products', [
            'categories' => $categories,
            'collections' => $collections
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
        if ($slug == 'all') {
            $products = Product::with('product_photos')->paginate(12);
        } else {
            $id = ProductCategory::where('slug', $slug)->first()->id;
            $products = Product::where('category_id', $id)->with(['product_photos', 'product_materials'])->paginate(12);
        }
        $categories = ProductCategory::all();

        $allCategory = $categories->firstWhere('name', 'All');
        $othersCategory = $categories->firstWhere('name', 'Others');

        // Filter keluar "All" dan "Others" dari koleksi utama
        $categories = $categories->reject(function ($category) {
            return in_array($category->name, ['All', 'Others']);
        });

        // Tambahkan "All" di awal, dan "Others" di akhir
        if ($allCategory) {
            $categories->prepend($allCategory);
        }

        if ($othersCategory) {
            $categories->push($othersCategory);
        }
        // dd($categories, $products, $id);
        return view(
            'components.product',
            [
                'products' => $products,
                'categories' => $categories
            ]
        );
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
