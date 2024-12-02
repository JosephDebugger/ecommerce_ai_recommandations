<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\settings\Brand;
use App\Models\Category;
use App\Models\admin\sale\Sale;
use App\Models\admin\sale\SaleItems;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Events\ProductInteracted;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\cms\Banner;
use App\Models\Contact;
class HomeController extends Controller
{
    public function home()
    {

        $data['banners'] = Banner::all();
        $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
            ->where('products.status', 'Active')
            ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image')
            ->orderBy('id', 'desc')->get();
        return view('frontend.home', $data);
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function categorized($gender, $category)
    {
        if ($category == 0) {
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
                ->where('products.status', 'Active')
                ->where('products.cloth_for', $gender)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image', )
                ->orderBy('id', 'desc')->get();
        } else {
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
                ->where('products.status', 'Active')
                ->where('products.cloth_for', $gender)
                ->where('products.category_id', $category)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image', )
                ->orderBy('id', 'desc')->get();
        }

        return view('frontend.' . $gender, ['products' => $data['products']]);
    }
    public function bandProducts($id)
    {

        if ($id == 0) {
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
                ->where('products.status', 'Active')
                ->where('products.band_id', '>', 0)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image')
                ->orderBy('id', 'desc')->get();
        } else {
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
                ->where('products.status', 'Active')
                ->where('products.band_id', $id)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image')
                ->orderBy('id', 'desc')->get();

        }


        return view('frontend.bandProducts', ['products' => $data['products']]);
    }

    public function product($id)
    {
        $product = Product::leftjoin('images', 'products.id', 'images.product_id')
            ->where('products.status', 'Active')
            ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.description', 'products.discount', 'products.status', 'images.name as image')->find($id);

        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            ProductInteracted::dispatch($userId, $id, 'view');
        }

        return view('frontend.product', ['product' => $product]);
    }
    public function checkout($products, $qty)
    {
        $quantity = explode(",", $qty);
        $product = explode(",", $products);
        $items = Product::whereIn('name', $product)->get();
        return view('frontend.checkOut', ['products' => $items, 'quantity' => $quantity]);
    }

    // public function checkoutProducts(Request $request)
    // {
    //     $productIds = $request->productIds;
    //     $quantity = $request->quantity;
    //     $unitPrice = $request->unitPrice;
    //     $totalPrice =0;
    //     try{
    //         DB::beginTransaction();
    //         $sale  = new Sale;
    //         $sale->sale_date = date('Y-m-d');
    //         $sale->customer_id = '1';
    //         $sale->payment_method = 'Card';
    //         $sale->save();
    //         $id = $sale->id;
    //         foreach($productIds as $key => $productId){
    //             // echo $productId;
    //             $totalPrice += $unitPrice[$key]*$quantity[$key];
    //             $saleItems = new SaleItems;
    //             $saleItems->sales_id = $id;
    //             $saleItems->product_id = $productId;
    //             $saleItems->quantity =  $quantity[$key]; 
    //             $saleItems->price_per_unit =  $unitPrice[$key];
    //             $saleItems->total_price =  $unitPrice[$key]*$quantity[$key];
    //             $saleItems->save();
    //         }
    //         $sale->total_amount = $totalPrice;
    //         $sale->save();
    //         DB::commit();
    //     }catch(Exception $e){
    //         DB::rollback();
    //     }


    //     return response()->json('success');
    // }

    public function checkoutProducts(Request $request)
    {
        $productIds = $request->productIds;
        $quantities = $request->quantity;
        $unitPrices = $request->unitPrice;
        $userId = 1;
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
        }
        try {
            DB::beginTransaction();

            // Create Sale record
            $sale = Sale::create([
                'sale_date' => now()->format('Y-m-d H:i:s'),
                'customer_id' => 1,
                'payment_method' => 'Card',
            ]);

            $totalPrice = 0;

            // Prepare SaleItems data
            $saleItemsData = [];
            foreach ($productIds as $key => $productId) {
                $quantity = $quantities[$key];
                $unitPrice = $unitPrices[$key];
                $itemTotalPrice = $quantity * $unitPrice;

                $totalPrice += $itemTotalPrice;

                $saleItemsData[] = [
                    'sales_id' => $sale->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price_per_unit' => $unitPrice,
                    'total_price' => $itemTotalPrice,
                ];
            }

            // Bulk insert SaleItems
            SaleItems::insert($saleItemsData);

            // Update total amount in Sale
            $sale->update(['total_amount' => $totalPrice]);

            DB::commit();

            if (Auth::guard('customer')->check()) {
                $userId = Auth::guard('customer')->id();
                ProductInteracted::dispatch($userId, $productId, 'purchase');
            }


            return response()->json(['message' => 'success'], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'error', 'error' => $e->getMessage()], 500);
        }
    }
    public function rateProduct(Request $request, $productId)
    {
        // $userId = auth()->id();
        $rating = $request->input('rating');
        $userId = 1;
        // Save the rating to the database
        Rating::updateOrCreate(
            ['user_id' => $userId, 'product_id' => $productId],
            ['rating' => $rating]
        );

        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            ProductInteracted::dispatch($userId, $productId, 'rate');
        }

        return response()->json(['message' => 'Rating saved successfully']);
    }
    public function recommendations()
    {

        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $recommendedProducts = Product::leftjoin('images', 'products.id', 'images.product_id')->select('products.id', 'products.cloth_for', 'products.brand_id', 'products.category_id', 'products.sub_category_id', 'products.band_id', 'products.unit', 'products.name', 'products.price', 'images.name as image', 'products.discount')
                ->join('recommendations', 'recommendations.product_id', 'products.id')->distinct('products.id')
                ->where('recommendations.user_id', $userId)->get();
        } else {
            $recommendedProducts = Product::leftjoin('images', 'products.id', 'images.product_id')->select('products.id', 'products.cloth_for', 'products.brand_id', 'products.category_id', 'products.sub_category_id', 'products.band_id', 'products.unit', 'products.name', 'products.price', 'images.name as image', 'products.discount')
                ->join('recommendations', 'recommendations.product_id', 'products.id')
                ->get();
        }

        return response()->json(compact('recommendedProducts'));
    }

    public function setReview(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $product_id = $request->product_id;
            $ratingNum = $request->review;
            ;
            $rating = Rating::create([
                'product_id' => $product_id,
                'user_id' => $userId,
                'rating' => $ratingNum,
            ]);
            $fached = ProductInteracted::dispatch($userId, $product_id, 'rate');
        }
        return response()->json(['status' => $fached]);
    }
    public function saveUserMsg(Request $request)
    {
        $messages = new Contact;
        $messages->full_name = $request->name;
        $messages->email = $request->email;
        $messages->subject = $request->subject;
        $messages->message = $request->message;
        $messages->save();
        return redirect()->route('contact');
    }

}
