<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMaterial;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['product_photos', 'product_category', 'product_materials'])->paginate(10);
        $categories = ProductCategory::all();
        $trashedProducts = Product::onlyTrashed()->with(['product_photos', 'product_category', 'product_materials'])->paginate(10);

        if (
            request()->has('search')
        ) {
            $products = Product::with(['product_photos', 'product_category', 'product_materials'])
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('sku', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->paginate(10);
            $trashedProducts = Product::onlyTrashed()
                ->with(['product_photos', 'product_category', 'product_materials'])
                ->where(function ($query) {
                    $search = request('search');
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('sku', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                })
                ->paginate(10);

            // dd($trashedProducts);
        } else if (
            request()->has('category') && request('category') != 'all'
        ) {
            $categoryId = $categories->where('slug', request('category'))->first()->id;

            $products = Product::with(['product_photos', 'product_category', 'product_materials'])
                ->where('category_id', $categoryId)
                ->paginate(10);
            $trashedProducts = Product::onlyTrashed()->with(['product_photos', 'product_category', 'product_materials'])
                ->where('category_id', $categoryId)
                ->paginate(10);
        }

        return view('components.admin-page.product.admin-products', [
            'products' => $products,
            'categories' => $categories,
            'trashedProducts' => $trashedProducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $materials = Material::all();
        return view('components.admin-page.product.admin-product-create', [
            'categories' => $categories,
            'materials' => $materials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku',
            'description' => 'required|string',
            'long' => 'required|integer',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'stock' => 'required|integer',
            'materials' => 'nullable|array',
            'materials.*.material_id' => 'required|exists:materials,id',
            'materials.*.quantity_used' => 'required|numeric|min:0',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|max:2048|mimes:jpg,jpeg,png|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
        ]);

        // Memeriksa file yang diupload dan dimensi gambar
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                // Mendapatkan ukuran gambar
                $imagePath = $file->getRealPath();
                $imageSize = getimagesize($imagePath);

                if ($imageSize === false) {
                    return redirect()->back()->withErrors(['photos' => 'Invalid image file.']);
                }

                // Mendapatkan lebar dan tinggi gambar
                $width = $imageSize[0];
                $height = $imageSize[1];

                // Memeriksa apakah rasio gambar adalah 1:1 atau 3:4
                $ratio = $width / $height;
                if (!($ratio == 1 || $ratio == (3 / 4))) {
                    return redirect()->back()->withErrors(['photos' => 'The photo must have a ratio of 1:1 or 3:4.']);
                }
            }
        }

        // dd($request->all());

        // Simpan produk
        $product = Product::create($request->only([
            'name',
            'sku',
            'description',
            'long',
            'width',
            'height',
            'price',
            'category_id',
            'stock'
        ]));

        // Sinkronisasi bahan ke tabel pivot
        if ($request->has('materials')) {
            foreach ($request->materials as $material) {
                ProductMaterial::create([
                    'product_id' => $product->id,
                    'material_id' => $material['material_id'],
                    'quantity_used' => $material['quantity_used'],
                ]);
            }
        }

        // Simpan foto produk
        if ($request->hasFile('photos')) {
            $isFirstPhoto = true;

            foreach ($request->file('photos') as $ind => $photo) {
                $categoriSlug = ProductCategory::find($request->input('category_id'))->slug;
                $path = $photo->store("products/{$categoriSlug}", 'public');
                ProductPhoto::create([
                    'product_id' => $product->id,
                    'photo_url' => $path,
                    'alt_text' => $request->input('name') . '-' . $ind,
                    'is_main' => $isFirstPhoto ? 1 : 0,
                ]);

                $isFirstPhoto = false;
            }
        }


        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
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
        $product = Product::with(['product_photos', 'product_category', 'product_materials'])->findOrFail($id);
        $materials = Material::all();
        $categories = ProductCategory::all();
        return view('components.admin-page.product.admin-product-edit', [
            'product' => $product,
            'materials' => $materials,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);
        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Product not found.');
        }

        // dd($request->file('photos'));

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'description' => 'required|string',
            'long' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'materials' => 'nullable|array',
            'materials.*.material_id' => 'required|exists:materials,id',
            'materials.*.quantity_used' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:product_categories,id',
            'stock' => 'required|numeric|min:0',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|max:2048|mimes:jpg,jpeg,png|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'delete_photos' => 'nullable|array',
            'delete_photos.*' => 'exists:product_photoss,id',
        ]);

        // Memeriksa file yang diupload dan dimensi gambar
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                // Mendapatkan ukuran gambar
                $imagePath = $file->getRealPath();
                $imageSize = getimagesize($imagePath);

                if ($imageSize === false) {
                    return redirect()->back()->withErrors(['photos' => 'Invalid image file.']);
                }

                // Mendapatkan lebar dan tinggi gambar
                $width = $imageSize[0];
                $height = $imageSize[1];

                // Memeriksa apakah rasio gambar adalah 1:1 atau 3:4
                $ratio = $width / $height;
                if (!($ratio == 1 || $ratio == (3 / 4))) {
                    return redirect()->back()->withErrors(['photos' => 'The photo must have a ratio of 1:1 or 3:4.']);
                }
            }
        }

        // Update basic product data
        $product->update([
            'name' => $validated['name'],
            'sku' => $validated['sku'],
            'description' => $validated['description'],
            'long' => $validated['long'],
            'width' => $validated['width'],
            'height' => $validated['height'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'stock' => $validated['stock'],
        ]);

        /// Update materials (pivot table)
        if ($request->has('materials')) {
            // Menggunakan mapWithKeys untuk menyiapkan data pivot
            $materialsData = collect($validated['materials'])->mapWithKeys(function ($material) {
                return [$material['material_id'] => ['quantity_used' => $material['quantity_used']]];
            })->toArray();

            // Menyinkronkan data pivot dengan sync
            $product->product_materials()->sync($materialsData);
        } else {
            // Jika tidak ada material, hapus semua data pivot
            $product->product_materials()->detach();
        }

        // Hapus foto berdasarkan ID
        if ($request->filled('delete_photos')) {
            $photosToDelete = ProductPhoto::whereIn('id', $validated['delete_photos'])->get();

            foreach ($photosToDelete as $photo) {
                Storage::delete($photo->photo_url); // Hapus file dari storage
                $photo->delete(); // Hapus dari database
            }
        }

        // Tambahkan foto baru
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $ind => $photo) {
                $categoriSlug = ProductCategory::find($request->input('category_id'))->slug;
                $path = $photo->store("products/{$categoriSlug}", 'public');
                $product->product_photos()->create([
                    'product_id' => $product->id,
                    'photo_url' => $path,
                    'alt_text' => $request->input('name') . '-' . $ind,
                    'is_main' => false
                ]);
            }
        }

        if ($request->has('is_main')) {
            // Setel semua foto menjadi non-main
            $product->product_photos()->update(['is_main' => false]);

            // Setel foto utama yang baru
            foreach ($request->input('is_main') as $photoId) {
                $photo = $product->product_photos()->find($photoId);
                if ($photo) {
                    $photo->update(['is_main' => true]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Soft delete produk
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    public function permanentlyDelete($id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        // Hapus data di tabel pivot product_materials
        if ($product->product_materials->isNotEmpty()) {
            $product->product_materials()->detach();
        }

        // Hapus foto produk
        if ($product->product_photos->isNotEmpty()) {
            foreach ($product->product_photos as $photo) {
                Storage::disk('public')->delete($photo->photo_url);
                $photo->delete();
            }
        }

        $product->forceDelete();
        return redirect()->route('admin.products.index')->with('success', 'Product permanently deleted successfully!');
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('admin.products.index')->with('success', 'Product restored successfully!');
    }
}
