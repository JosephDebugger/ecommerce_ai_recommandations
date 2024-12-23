<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use Yajra\DataTables\DataTables;
// use DataTa
use App\Models\admin\Image;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Models\admin\settings\Category;
use App\Models\admin\settings\Brand;
use Illuminate\Support\Facades\DB;
use App\Models\admin\Band;

class ProductController extends Controller
{
    //
    public function products(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::select('products.id', 'products.price', 'products.name','products.stock', 'products.discount', 'products.status', 'images.name as image')
                ->leftJoin('images', 'products.id', '=', 'images.product_id')->where('images.type','Default');

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $fromDate = Carbon::createFromFormat('Y-m-d', $request->from_date)->startOfDay();
                $toDate = Carbon::createFromFormat('Y-m-d', $request->to_date)->endOfDay();
                $query->whereBetween('products.created_at', [$fromDate, $toDate]);
            }
            $products = $query->get();
            // Storage::disk('public')->put('file.json', '');
            // Storage::disk('public')->put('file.json', json_encode($products, JSON_PRETTY_PRINT));
            return DataTables::of($products)->addIndexColumn()->make(true);
        }
        $products = Product::select('products.id', 'products.price', 'products.name','products.stock',  'products.discount', 'products.status', 'images.name as image')
            ->leftJoin('images', 'products.id', 'images.product_id')->where('images.type','Default')
            ->get();

        // Storage::disk('public')->put('file.json', '');
        // Storage::disk('public')->put('file.json', json_encode($products, JSON_PRETTY_PRINT));

        return view('admin.inventory.product.products', ['products' => $products]);
    }
    public function viewAddProduct()
    {
        $bands = Band::select('name', 'id')->where('status', 'Active')->get();
        $brands = Brand::select('name', 'id')->where('status', 'Active')->get();
        $categories = Category::select('name', 'id')->where('status', 'Active')->get();
        return view('admin.inventory.product.view-add-product', ['bands' => $bands,'brands' => $brands, 'categories' => $categories]);
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:products,name', 
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             
        ]);

        if ($request->image != null) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;
        } else {
            $imagePath = 'uploads/images.png';
        }

        $gender = '';
        $tranding = '';
        $featured = '';

        if ($request->has('checkRadio')) {
            $gender = $request->has('checkRadio');
        } 

        if ($request->has('tranding')) {
            $tranding = 'Yes';
        } else {
            $tranding = 'No';
        }

        if ($request->has('featured')) {
            $featured = 'Yes';
        } else {
            $featured = 'No';
        }
        // Create Post
        $Product = new Product;
        $Product->name = $request->input('name');
        $Product->price = $request->input('price');
        $Product->stock = $request->input('stock');
        $Product->band_id = $request->input('band');
        $Product->brand_id = $request->input('brand');
        $Product->category_id = $request->input('category');
        $Product->sub_category_id = $request->input('sub_category');
        $Product->description = $request->input('description');
        $Product->discount = $request->input('discount');
        $Product->cloth_for = $gender;
        $Product->additional_info = $request->input('add_info');
        $Product->Tranding = $tranding;
        $Product->featured = $featured;
        $Product->status = $request->input('status');
        $Product->save();
        $image = new Image;
        $image->name = $imagePath;
        $image->product_id = $Product->id;
        $image->type = 'Default';
        $image->save();
        return redirect()->route('inventory.products')
            ->with('success', 'Product created successfully.');
    }

    public function imagesStore(Request $request)
    {
       
        $validated = $request->validate([
            'images.*.id' => 'nullable|integer',
            'images.*.image_file' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'images.*.description' => 'nullable|string',
            'images.*.old_image' => 'nullable|string'
        ]);
       // return $validated;
        $product_id = $request->input('product_id');
        foreach ($validated['images'] as $key => $img) {
            // return $img['id'];
            if (isset($img['image_file']) && $img['image_file'] != null) {
                $imageName = time() . '.' . $img['image_file']->extension();
                $img['image_file']->move(public_path('uploads/products/'), $imageName);
                $imagePath = 'uploads/products/' . $imageName;
            } else {
                if($img['old_image'] != null){
                    $imagePath = $img['old_image'];
                }else{
                    $imagePath = 'uploads/images.png';
                }
            }

            if($img['id'] > 0){
                $image = Image::find($img['id']);
                $image->name = $imagePath;
                $image->details = $img['description'] ?? null;
                $image->save();
            }else{
                $image = new Image;
                $image->name = $imagePath;
                $image->product_id = $product_id;
                $image->details = $img['description'] ?? null;
                $image->type = 'Other';
                $image->save();
            }
          
        }

        
        return response()->json(['message' => 'Image created successfully.'], 200);
    } 
    public function imagesDestroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return response()->json(['message' => 'Image Deleted.'], 200);
    }
    public function getImages($id)
    {
        $images = Image::where('product_id', $id)->where('type', 'Other')->get();
        return response()->json($images);
    }  
    public function getProduct($id)
    {
        $data  = [];
        $data['product'] = Product::leftJoin('images', 'products.id', '=', 'images.product_id')
               ->where('images.type','Default')
               ->where('products.id',$id)
               ->select('products.id', 'products.price', 'products.Tranding','products.stock','products.cloth_for','products.name','products.brand_id','products.category_id','products.sub_category_id', 'products.discount', 'products.status', 'images.name as image')->first();
        $data['bands'] = Band::select('name', 'id')->where('status', 'Active')->get();
        $data['brands'] = Brand::select('name', 'id')->where('status', 'Active')->get();
        $data['categories'] = Category::select('name', 'id')->where('status', 'Active')->get();
        return view('admin.inventory.product.view-edit-product', $data);
    }
    public function getCategory($gender)
    {
        
        $data = DB::table('categories')->where('type', $gender)->get();
       
        return response()->json($data);
    }
    public function getGetSubCategory($id)
    {
        
        $data = DB::table('sub_categories')->where('category_id', $id)->get();
       
        return response()->json($data);
    }
    
    public function updateProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $imageName = time().'.'.$request->input('image')->extension();
        // $request->image->move(public_path('uploads/images/priducts/'), $imageName);


        if ($request->image != null) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;
        } else {
            $image = $request->old_image;
            $imagePath =  $image;
        }

        if ($request->has('checkRadio')) {
            $gender = $request->has('checkRadio');
        } 

        if ($request->has('tranding')) {
            $tranding = 'Yes';
        } else {
            $tranding = 'No';
        }

        if ($request->has('featured')) {
            $featured = 'Yes';
        } else {
            $featured = 'No';
        }

        $Product =  Product::find($request->input('id'));
        $Product->name = $request->input('name');
        $Product->price = $request->input('price');
        $Product->band_id = $request->input('band');
        $Product->description = $request->input('description');
        $Product->discount = $request->input('discount');
        $Product->cloth_for = $gender;
        $Product->Tranding = $tranding;
        $Product->featured = $featured;
        $Product->stock = $Product->stock + $request->input('newQuantity');
        $Product->additional_info = $request->input('add_info');
        $Product->status = $request->input('status');
        $Product->save();
        Image::where('product_id', $Product->id)->where('type' , 'Default')
        ->update([
           'name' =>$imagePath
        ]);
        // $image = new Image;
        // $image->name = 'images/'.$imageName;
        // $image->product_id = $Product->id;
        // $image->save();
        return redirect()->route('inventory.products')
            ->with('success', 'Product Updated successfully.');
    }
    public function productDestroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('success', 'Product Deleted');
    }
}
