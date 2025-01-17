<?php

namespace App\Http\Controllers;

use App\Models\admin\settings\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\settings\SubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        return view('admin.inventory.category.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inventory.category.view-add-category');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/',
                'unique:categories,name,NULL,id,type,' . $request->type,
            ],
            'type' => [
                'required'
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000',
                'regex:/^[a-zA-Z0-9\s]+$/',
            ],
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.inventory.category.view-brand', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.inventory.category.view-edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-Z0-9\s]+$/',
                'unique:categories,name,' . $category->id, // Unique validation, ignoring the current record
            ],
            'type' => [
                'required'
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/',
            ],
        ]);
        $category->update($validatedData);

        return redirect()->route('categories.index')
            ->with('success', 'Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    public function subCategoryStore(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategories.*.name' => 'required|string|max:255',
            'subcategories.*.description' => 'nullable|string',
        ]);

        foreach ($validated['subcategories'] as $sub) {
            SubCategory::create([
                'category_id' => $validated['category_id'],
                'sub_cetegory_name' => $sub['name'],
                'description' => $sub['description'] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Subcategories added successfully.');
    }
    public function subcategoryDestroy($id)
    {

        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            return redirect()->back()->with('error', 'Subcategory not found.');
        }
        $subCategory->delete();
        return redirect()->back()->with('success', 'Subcategories Deleted successfully.');
    }
}
