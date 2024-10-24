<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\settings\Brand;
use App\Models\Category;

class HomeController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::latest()->get();
        $data['brands'] = Brand::latest()->get();
        $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
            ->where('products.status', 'Active')
            ->select('products.id', 'products.price', 'products.name', 'products.discount', 'products.status', 'images.name as image',)
            ->orderBy('id', 'desc')->get();
        return view('frontend.home',  $data);
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function mens()
    {
        return view('frontend.mens');
    }
    public function womens()
    {
        return view('frontend.womens');
    }
    public function product($id)
    {
        $product = Product::find($id);
        return view('frontend.product', ['product' => $product]);
    }
}
