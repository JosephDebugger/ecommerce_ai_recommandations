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

class ProductController extends Controller
{
    //
    public function products(Request $request){
        if($request->ajax()){
            $query = Product::select('products.id', 'products.price', 'products.name', 'products.discount', 'products.status', 'images.name as image')
            ->leftJoin('images', 'products.id', '=', 'images.product_id');

            if($request->filled('from_date') && $request->filled('to_date'))
            {
                $fromDate = Carbon::createFromFormat('Y-m-d', $request->from_date)->startOfDay();
                $toDate = Carbon::createFromFormat('Y-m-d', $request->to_date)->endOfDay();
                $query->whereBetween('products.created_at', [$fromDate, $toDate]);
            }
            $products = $query->get();
            Storage::disk('public')->put('file.json', '');
            Storage::disk('public')->put('file.json', json_encode($products, JSON_PRETTY_PRINT));
            return DataTables::of($products)->addIndexColumn()->make(true);
        }
        $products = Product::select('products.id','products.price','products.name','products.discount','products.status','images.name as image')
        ->leftJoin('images','products.id', 'images.product_id')   
        ->get();

        Storage::disk('public')->put('file.json', '');
        Storage::disk('public')->put('file.json', json_encode($products, JSON_PRETTY_PRINT));

        return view('admin.inventory.product.products',['products'=>$products]);
    }
    public function viewAddProduct(){
        $brands = Brand::select('name','id')->where('status','Active')->get();
        $categories = Category::select('name','id')->where('status','Active')->get();
        return view('admin.inventory.product.view-add-product',['brands'=>$brands,'categories'=>$categories]);

    }
    public function storeProduct(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if($request->image != null){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/products/'), $imageName);
                $imagePath = 'uploads/products/' . $imageName;
            }else{
                $imagePath = 'uploads/images.png';
            }

            $gender = $request->input('gender');
            
        // Create Post
        $Product = new Product;
        $Product->name = $request->input('name');
        $Product->price = $request->input('price');
        $Product->brand_id = $request->input('brand');
        $Product->category_id = $request->input('category');
        $Product->sub_category_id = $request->input('sub_category');
        $Product->description = $request->input('description');
        $Product->discount = $request->input('discount');
        $Product->cloth_for = $gender;
        $Product->additional_info = $request->input('add_info');
        $Product->status = $request->input('status');
        $Product->save();
        $image = new Image;
        $image->name = $imagePath;
        $image->product_id = $Product->id;
        $image->save();
        return redirect()->route('inventory.products')
                         ->with('success', 'Product created successfully.');

    }
     public function getProduct($id){
        $data  = [];
        $data['product'] = Product::find($id);
        $data['brands'] = Brand::select('name','id')->where('status','Active')->get();
        $data['categories'] = Category::select('name','id')->where('status','Active')->get();
        return view('admin.inventory.product.view-edit-product',$data);
    }
    public function updateProduct(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

    // $imageName = time().'.'.$request->input('image')->extension();
    // $request->image->move(public_path('uploads/images/priducts/'), $imageName);
     
   
    $Product =  Product::find($request->input('id'));
    $Product->name = $request->input('name');
    $Product->price = $request->input('price');
    $Product->description = $request->input('description');
    $Product->discount = $request->input('discount');
    $Product->additional_info = $request->input('add_info');
    $Product->status = $request->input('status');
    $Product->save();
    // $image = new Image;
    // $image->name = 'images/'.$imageName;
    // $image->product_id = $Product->id;
    // $image->save();
    return redirect()->route('inventory.products')
                     ->with('success', 'Product Updated successfully.');

    }
    public function productDestroy($id){

        $product = Product::find($id);
        $product->delete();
        return redirect('inventory/products')->with('success', 'Product Deleted');
    }
   
}
