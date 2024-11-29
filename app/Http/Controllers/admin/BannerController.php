<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\cms\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.cms.banner.banners', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cms.banner.view-add-banner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/'
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000',
                'regex:/^[a-zA-Z0-9\s]+$/', // Alphanumeric validation
            ],
            'file_name' =>  [
                'file_name',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
              
            ],
        ]);

        if ($request->file_name != null) {
            $imageName = time() . '.' . $request->band_cover->extension();
            $request->file_name->move(public_path('uploads/banners/'), $imageName);
            $imagePath = 'uploads/banners/' . $imageName;
            $validatedData['file_name'] = $imagePath;
        } else {
            $imagePath = 'uploads/images.png';
        }

        Banner::create($validatedData);
        

        return redirect()->route('banners.index')
            ->with('success', 'Banner created successfully.');
    }
    
    public function show(Banner $brand)
    {
        return view('admin.cms.banner.view-banner', compact('brand'));
    }

   
    public function edit(Banner $brand)
    {
        return view('admin.cms.banner.view-edit-banner', compact('brand'));
    }

    
    public function update(Request $request, Banner $brand)
    {
        $validatedData = $request->validate([
            'file_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-Z0-9\s]+$/'
               
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

        return redirect()->route('banners.index')
            ->with('success', 'Banner Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $brand)
    {
        $brand->delete();

        return redirect()->route('banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
