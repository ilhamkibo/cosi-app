<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class AdminMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::paginate(10);
        $trashedMaterials = Material::onlyTrashed()->paginate(10);

        if (request()->has('search')) {
            $materials = Material::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->paginate(10);
            $trashedMaterials = Material::onlyTrashed()
                ->where(
                    function ($query) {
                        $query->where('name', 'like', '%' . request('search') . '%')
                            ->orWhere('description', 'like', '%' . request('search') . '%');
                    }
                )->paginate(10);
        }

        return view('components.admin-page.material.materials', compact('materials', 'trashedMaterials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.admin-page.material.material-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'slug' => 'required|unique:materials',
            'unit' => 'required',
        ]);
        // dd($validate);
        $validate['slug'] = str_replace(' ', '-', $request->slug);

        Material::create($validate);

        return redirect()->route('admin.materials.index')->with('success', 'Material created successfully!');
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
        $material = Material::findOrFail($id);
        return view('components.admin-page.material.material-edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = Material::findOrFail($id);

        // Initialize the validation rules array
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
        ];
        // dd($request->slug);
        // Add conditional rule for slug if slug is being changed
        if ($material->slug != $request->slug) {
            $rules['slug'] = 'required|unique:materials';
        }

        // Perform validation based on the dynamic rules
        $validatedData = $request->validate($rules);

        // If the slug was updated, apply the transformation
        if ($material->slug != $request->slug) {
            $validatedData['slug'] = str_replace(' ', '-', $request->slug);
        }

        // Update the material
        $material->update($validatedData);

        return redirect()->route('admin.materials.index')->with('success', 'Material updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Material sent to trash successfully!');
    }

    public function permanentlyDelete($id)
    {
        $material = Material::withTrashed()->findOrFail($id);
        $material->forceDelete();
        return redirect()->route('admin.materials.index')->with('success', 'Material permanently deleted successfully!');
    }

    public function restore($id)
    {
        $material = Material::withTrashed()->findOrFail($id);
        $material->restore();
        return redirect()->route('admin.materials.index')->with('success', 'Material restored successfully!');
    }
}
