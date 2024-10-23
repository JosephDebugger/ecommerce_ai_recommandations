<?php

namespace App\Http\Controllers;

use App\Models\admin\settings\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.inventory.brand.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inventory.brand.view-add-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/', // Alphanumeric validation
                'unique:brands,name', // Unique validation
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000',
                'regex:/^[a-zA-Z0-9\s]+$/', // Alphanumeric validation
            ]
        ]);

        Brand::create($validatedData);

        return redirect()->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }
    
    public function show(Brand $brand)
    {
        return view('admin.inventory.brand.view-brand', compact('brand'));
    }

   
    public function edit(Brand $brand)
    {
        return view('admin.inventory.brand.view-edit-brand', compact('brand'));
    }

    
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-Z0-9\s]+$/', 
                'unique:brands,name,' . $brand->id, // Unique validation, ignoring the current record
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/', 
            ],
            'status' => [
                'required'
            ],
        ]);
        $brand->update($validatedData);

        return redirect()->route('brands.index')
            ->with('success', 'Brand Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
