<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\admin\AdminArticleController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\auth\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::resource('articles', ArticleController::class);
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutUsController::class, 'index'])->name('about');

// Route::get('/admin', [AdminAuthController::class, 'index'])->name('admin');
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');

Route::resource('admin/products', AdminProductController::class)->names([
    'index' => 'admin.products.index',
    'create' => 'admin.products.create',
    'store' => 'admin.products.store',
    'show' => 'admin.products.show',
    'edit' => 'admin.products.edit',
    'update' => 'admin.products.update',
    'destroy' => 'admin.products.destroy',
]);

Route::resource('admin/articles', AdminArticleController::class)->names([
    'index' => 'admin.articles.index',
    'create' => 'admin.articles.create',
    'store' => 'admin.articles.store',
    'show' => 'admin.articles.show',
    'edit' => 'admin.articles.edit',
    'update' => 'admin.articles.update',
    'destroy' => 'admin.articles.destroy',
]);
