<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\admin\AdminArticleController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminMaterialController;
use App\Http\Controllers\admin\AdminPermissionController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\AdminRoleController;
use App\Http\Controllers\admin\AdminUserController;
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

Route::get('admin/login', [AdminAuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('login.post');
// Route::get('/register', [AdminAuthController::class, 'createUser'])->middleware('guest')->name('register.view');
// Route::post('/register', [AdminAuthController::class, 'register'])->middleware('guest')->name('register.post');



Route::get('/review', function () {
    return redirect('https://g.page/r/CT2JJIrE7ebGEAI/review');
})->name('review');


// Route::get('/admin', [AdminAuthController::class, 'index'])->name('admin');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('home', [AdminHomeController::class, 'index'])->name('admin.home');

    Route::resource('profile', AdminProfileController::class)->names([
        'edit' => 'admin.profile.edit',
        'update' => 'admin.profile.update',
        'destroy' => 'admin.profile.destroy',
        'show' => 'admin.profile.show',
        'create' => 'admin.profile.create',
        'store' => 'admin.profile.store',
        'index' => 'admin.profile.index',
    ]);


    Route::group(['middleware' => ['role:superadmin|articles manager']], function () {

        Route::get('articles', [AdminArticleController::class, 'index'])->name('admin.articles');
    });

    // Products: Akses untuk admin dan superadmin
    Route::group(['middleware' => ['role:products manager|superadmin']], function () {
        Route::resource('products', AdminProductController::class)->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'show' => 'admin.products.show',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);

        Route::patch('products/{id}/restore', [AdminProductController::class, 'restore'])->name('admin.products.restore');
        Route::delete('products/{id}/permanently-delete', [AdminProductController::class, 'permanentlyDelete'])->name('admin.products.permanentlyDelete');
    });

    Route::group(['middleware' => ['role:superadmin|materials manager']], function () {
        Route::resource('materials', AdminMaterialController::class)->names([
            'index' => 'admin.materials.index',
            'create' => 'admin.materials.create',
            'store' => 'admin.materials.store',
            'show' => 'admin.materials.show',
            'edit' => 'admin.materials.edit',
            'update' => 'admin.materials.update',
            'destroy' => 'admin.materials.destroy',
        ]);

        Route::patch('materials/{id}/restore', [AdminMaterialController::class, 'restore'])->name('admin.materials.restore');
        Route::delete('materials/{id}/permanently-delete', [AdminMaterialController::class, 'permanentlyDelete'])->name('admin.materials.permanentlyDelete');
    });

    // Roles dan Permissions: Akses hanya untuk superadmin
    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::resource('roles', AdminRoleController::class)->names([
            'index' => 'admin.roles.index',
            'create' => 'admin.roles.create',
            'store' => 'admin.roles.store',
            'show' => 'admin.roles.show',
            'edit' => 'admin.roles.edit',
            'update' => 'admin.roles.update',
            'destroy' => 'admin.roles.destroy',
        ]);

        Route::resource('users', AdminUserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);
        Route::patch('users/{id}/restore', [AdminUserController::class, 'restore'])->name('admin.users.restore');
        Route::delete('users/{id}/permanently-delete', [AdminUserController::class, 'permanentlyDelete'])->name('admin.users.permanentlyDelete');


        Route::resource('permissions', AdminPermissionController::class)->names([
            'index' => 'admin.permissions.index',
            'create' => 'admin.permissions.create',
            'store' => 'admin.permissions.store',
            'show' => 'admin.permissions.show',
            'edit' => 'admin.permissions.edit',
            'update' => 'admin.permissions.update',
            'destroy' => 'admin.permissions.destroy',
        ]);

        Route::resource('categories', AdminCategoryController::class)->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'show' => 'admin.categories.show',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    //Email Verification Notice
    Route::get('/email/verify', [AdminAuthController::class, 'verifyNotice'])->name('verification.notice');

    // Email Verification Handler
    Route::get('/email/verify/{id}/{hash}', [AdminAuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');

    // Resend Email Verification
    Route::post('/email/verification-notification', [AdminAuthController::class, 'verifyHandler'])->middleware('throttle:6,1')->name('verification.send');
});
