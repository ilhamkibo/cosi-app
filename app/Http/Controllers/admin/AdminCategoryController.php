<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = ProductCategory::paginate(10);
        $trashedCategories = ProductCategory::onlyTrashed()->paginate(10);
        return view('components.admin-page.category.categories', compact('categories', 'trashedCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.admin-page.category.category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:product_categories',
            'slug' => 'required|unique:product_categories',
            'description' => 'required',
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                function ($attribute, $value, $fail) {
                    // Mendapatkan informasi gambar
                    $image = getimagesize($value);

                    if ($image) {
                        $width = $image[0];
                        $height = $image[1];

                        // Periksa apakah rasio aspek adalah 16:9
                        if (round($width / $height, 2) !== round(16 / 9, 2)) {
                            $fail("The {$attribute} must have a 16:9 aspect ratio.");
                        }
                    } else {
                        $fail("The {$attribute} is not a valid image.");
                    }
                },
            ],
        ]);
        // Simpan file ke dalam folder storage/categories
        $imagePath = $request->file('image')->store('/products/categories', 'public');
        // dd($imagePath);
        $productCategory = ProductCategory::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'photo_url' => $imagePath, // Path ke file yang disimpan
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
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
        $category = ProductCategory::findOrFail($id);
        return view('components.admin-page.category.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:product_categories,name,' . $id,
            'slug' => 'required|unique:product_categories,slug,' . $id,
            'description' => 'required',
            'image' => [
                'nullable', // Allow image to be null for optional updates
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $image = getimagesize($value);
                        if ($image) {
                            $width = $image[0];
                            $height = $image[1];
                            if (round($width / $height, 2) !== round(16 / 9, 2)) {
                                $fail("The {$attribute} must have a 16:9 aspect ratio.");
                            }
                        } else {
                            $fail("The {$attribute} is not a valid image.");
                        }
                    }
                },
            ],
        ]);

        // Retrieve the product category by ID
        $productCategory = ProductCategory::findOrFail($id);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($productCategory->photo_url && Storage::disk('public')->exists($productCategory->photo_url)) {
                Storage::disk('public')->delete($productCategory->photo_url);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('/products/categories', 'public');

            // Update the photo_url with the new image path
            $productCategory->photo_url = $imagePath;
        }

        // Update other fields
        $productCategory->name = $validated['name'];
        $productCategory->slug = $validated['slug'];
        $productCategory->description = $validated['description'];
        $productCategory->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category trashed successfully!');
    }

    public function restore(string $id)
    {
        $category = ProductCategory::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('admin.categories.index')->with('success', 'Category restored successfully!');
    }

    public function permanentlyDelete(string $id)
    {
        $category = ProductCategory::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted permanently!');
    }
}
