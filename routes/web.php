<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\admin\AdminArticleController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminPermissionController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminRoleController;
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

Route::get('/admin/login', [AdminAuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/register', [AdminAuthController::class, 'register'])->middleware('guest')->name('admin.register');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth')->name('admin.logout');

// Route::get('/admin', [AdminAuthController::class, 'index'])->name('admin');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('articles', [AdminArticleController::class, 'index'])->name('admin.articles');

    // Products: Akses untuk admin dan superadmin
    Route::group(['middleware' => ['role:admin|superadmin']], function () {
        Route::resource('products', AdminProductController::class)->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'show' => 'admin.products.show',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);
    });

    // Roles dan Permissions: Akses hanya untuk superadmin
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('roles', AdminRoleController::class)->names([
            'index' => 'admin.roles.index',
            'create' => 'admin.roles.create',
            'store' => 'admin.roles.store',
            'show' => 'admin.roles.show',
            'edit' => 'admin.roles.edit',
            'update' => 'admin.roles.update',
            'destroy' => 'admin.roles.destroy',
        ]);

        Route::resource('permissions', AdminPermissionController::class)->names([
            'index' => 'admin.permissions.index',
            'create' => 'admin.permissions.create',
            'store' => 'admin.permissions.store',
            'show' => 'admin.permissions.show',
            'edit' => 'admin.permissions.edit',
            'update' => 'admin.permissions.update',
            'destroy' => 'admin.permissions.destroy',
        ]);
    });
});


Route::get('/review', function () {
    return redirect('https://g.page/r/CT2JJIrE7ebGEAI/review');
})->name('review');
