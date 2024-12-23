<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\settings\Brand;
use App\Models\admin\settings\Category;
use App\Models\admin\sale\Sale;
use App\Models\admin\sale\SaleItems;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Events\ProductInteracted;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\cms\Banner;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\admin\Band;
use App\Models\Review;

class HomeController extends Controller
{
    public function home()
    {

        $data['banners'] = Banner::all();
        $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')
            ->where('images.type', 'Default')
            ->where('products.status', 'Active')
            ->select('products.id', 'products.price', 'products.name','products.stock', 'products.cloth_for', 'products.discount', 'products.status', DB::raw('MIN(images.name) as image'))
            ->groupBy('products.id', 'products.price', 'products.name','products.stock', 'products.cloth_for', 'products.discount', 'products.status')
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
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')
                ->where('products.status', 'Active')
                ->where('products.cloth_for', $gender)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image',)
                ->orderBy('id', 'desc')->get();
        } else {
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')
                ->where('products.status', 'Active')
                ->where('products.cloth_for', $gender)
                ->where('products.category_id', $category)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image',)
                ->orderBy('id', 'desc')->get();
        }

        return view('frontend.' . $gender, ['products' => $data['products']]);
    }
    public function bandProducts($id)
    {
        if ($id == 0) {
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')
                ->where('products.status', 'Active')
                ->where('products.band_id', '>', 0)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image')
                ->orderBy('id', 'desc')->get();
        } else {
            $data['products'] = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')
                ->where('products.status', 'Active')
                ->where('products.band_id', $id)
                ->select('products.id', 'products.price', 'products.name', 'products.cloth_for', 'products.discount', 'products.status', 'images.name as image')
                ->orderBy('id', 'desc')->get();
        }

        return view('frontend.bandProducts', ['products' => $data['products']]);
    }

    public function product($id)
    {
        $product = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')
            ->where('products.status', 'Active')
            ->select('products.id', 'products.price','products.stock', 'products.name', 'products.cloth_for', 'products.description', 'products.discount', 'products.status', 'images.name as image')->find($id);

        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            ProductInteracted::dispatch($userId, $id, 'view');
        }
        $reviews = Review::where('product_id', $id)->get();

        return view('frontend.product', ['product' => $product, 'reviews' => $reviews]);
    }
    public function checkout($products, $qty)
    {
        $quantity = explode(",", $qty);
        $product = explode(",", $products);
        $items = Product::whereIn('name', $product)->get();
        $customerInfo = '';
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $customerInfo  = Customer::find($userId);
        }

        return view('frontend.checkOut', ['products' => $items, 'quantity' => $quantity, 'customerInfo' => $customerInfo]);
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

        try {
            DB::beginTransaction();

            if (Auth::guard('customer')->check()) {
                $userId = Auth::guard('customer')->id();
                $customer  = Customer::find($userId);
                $customer->name  = $request->fname;
                $customer->email  = $request->email;
                $customer->address  = $request->address;
                $customer->state  = $request->state;
                $customer->city  = $request->city;
                $customer->name_on_card  = $request->cname;
                $customer->cc_number  = $request->cc_number;
                $customer->exp  = $request->expmonth;
                $customer->exp_year  = $request->expyear;
                $customer->cvv  = $request->cvv;
                $customer->save();
            } else {
            }
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
                // Deduct quantity from product stock
                $product = Product::find($productId);
                if ($product) {
                    $product->stock -= $quantity;
                    $product->save();
                }
                ProductInteracted::dispatch($userId, $productId, 'purchase');
            }

            // Bulk insert SaleItems
            SaleItems::insert($saleItemsData);
            // Update total amount in Sale
            $sale->update(['total_amount' => $totalPrice]);

            $bandRevenue = ($totalPrice / 10);
            if (Auth::guard('customer')->check()) {
                if ($customer->band_id > 0) {
                    $band = Band::find($customer->band_id);
                    $band->current_balance += $bandRevenue;
                    $band->save();
                }
            }

            DB::commit();

            // if (Auth::guard('customer')->check()) {
            //     $userId = Auth::guard('customer')->id();

            // }


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

        return response()->json(['message' => 'success']);
    }
    public function recommendations()
    {

        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $recommendedProducts = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')->select('products.id', 'products.cloth_for', 'products.brand_id', 'products.category_id', 'products.sub_category_id', 'products.band_id', 'products.unit', 'products.name', 'products.price', 'images.name as image', 'products.discount')
                ->join('recommendations', 'recommendations.product_id', 'products.id')->distinct('products.id')
                ->where('recommendations.user_id', $userId)->get();
        } else {
            $recommendedProducts = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')->select('products.id', 'products.cloth_for', 'products.brand_id', 'products.category_id', 'products.sub_category_id', 'products.band_id', 'products.unit', 'products.name', 'products.price', 'images.name as image', 'products.discount')
                ->join('recommendations', 'recommendations.product_id', 'products.id')
                ->distinct()->get();
        }

        return response()->json(compact('recommendedProducts'));
    }

    public function addReview(Request $request)
    {
        $userId = '';
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
        }
        $product_id = $request->product_id;
        $comment = $request->comment;
        $email = $request->email;
        $name = $request->name;
        Review::create([
            'product_id' => $product_id,
            'user_id' => $userId,
            'name' => $name,
            'email' => $email,
            'comment' => $comment,
        ]);
        $reviews = Review::where('product_id', $product_id)->get();
        return response()->json(['status' => 'success', 'reviews' => $reviews]);
    }

    public function setRating(Request $request)
    {
        $fached = '';
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $product_id = $request->product_id;
            $ratingNum = $request->rating;
            $rating = Rating::create([
                'product_id' => $product_id,
                'user_id' => $userId,
                'rating' => $ratingNum,
            ]);
            $fached = ProductInteracted::dispatch($userId, $product_id, 'rate');
        }
        return response()->json(['status' => 'success', 'fached' => $fached]);
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
    public function searchProducts($name =0)
    {
        if($name!=0){
            $product = trim($name);
            $searchedProducts = Product::leftjoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')
            ->select('products.id', 'products.cloth_for', 'products.brand_id', 'products.category_id', 'products.sub_category_id', 'products.band_id', 'products.unit', 'products.name', 'products.price', 'images.name as image', 'products.discount')
                ->where('products.name', 'LIKE', "%{$product}%")->get();
        }
       
        return response()->json(compact('searchedProducts'));
    }
}
