<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalChairProduct = Product::where('category_id', 1)->count();
        $totalTableProduct = Product::where('category_id', 2)->count();
        $totalOtherProduct = Product::where('category_id', 3)->count();

        return view('components.admin-page.admin-home', compact('totalProducts', 'totalChairProduct', 'totalTableProduct', 'totalOtherProduct'));
    }
}
