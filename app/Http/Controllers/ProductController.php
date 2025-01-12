<?php

namespace App\Http\Controllers;

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
        return view('components.products', [
            'categories' => $categories
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
            $products = Product::with('product_photo')->paginate(12);
        } else {
            $id = ProductCategory::where('slug', $slug)->first()->id;
            $products = Product::where('category_id', $id)->with('product_photo')->paginate(12);
        }
        $categories = ProductCategory::orderByRaw("FIELD(name, 'All', 'Chairs', 'Tables', 'Others')")->get();
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
