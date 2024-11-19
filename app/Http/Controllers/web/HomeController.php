<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\settings\Brand;
use App\Models\Category;
use App\Models\admin\sale\Sale;

class HomeController extends Controller
{
    public function home()
    {
       
        $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
            ->where('products.status', 'Active')
            ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image',)
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
    public function checkout($products,$qty)
    {
        $quantity= explode(",",$qty);
        $product= explode(",",$products);
        $items = Product::whereIn('name',$product)->get();
        return view('frontend.checkOut', ['products' => $items,'quantity'=>$quantity]);
    }
    
    public function checkoutProducts(Request $request)
    {
        
        $sale  = new Sale;
        sale_date
        total_amount
        customer_id
        payment_method
        return response()->json($request->all());
    }
    
}
