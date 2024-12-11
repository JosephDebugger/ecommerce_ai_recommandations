<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\admin\sale\Sale;
use App\Models\admin\sale\SaleItems;
use App\Models\admin\Band;
use App\Models\Chat;

class AccountController extends Controller
{
    //
    public function accountHome()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $customerInfo  = Customer::find($userId);
            return view('frontend.account-home', compact('customerInfo'));
        }
    }

    public function accountBillInfo()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $customerInfo  = Customer::find($userId);
          
            return view('frontend.account-bill_info', compact('customerInfo'));
        }
    }
    public function accountBandSale()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();

            $customerInfo  = Customer::find($userId);

            $band  = Band::find($customerInfo->band_id);
            $query = SaleItems::select('sale_items.id','products.name as product_name', 'sale_items.quantity','sales.sale_date', 'sale_items.total_price', 'customers.name', 'customers.email')
                ->leftJoin('sales', 'sale_items.sales_id', '=', 'sales.id')
                ->leftJoin('products', 'sale_items.product_id', '=', 'products.id')
                ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id')
                ->where('products.band_id', $customerInfo->band_id);
            $sales = $query->get();

            return view('frontend.account-sales', ['band'=>$band,'sales' => $sales, 'customerInfo' => $customerInfo]);
        } else {
            return  redirect()->route('customer.login');
        }
    }
    public function accountCustomerSalesOrder()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();

            $customerInfo  = Customer::find($userId);

            $query = Sale::select('sales.id', 'sales.total_amount','sales.status', 'sales.sale_date', 'customers.name', 'customers.email')
            ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id')
            ->where('customers.id', $userId);
            $orders = $query->get();

            return view('frontend.account-orders', ['orders' => $orders, 'customerInfo' => $customerInfo]);
        } else {
            return  redirect()->route('customer.login');
        }
    }
    public function accountBandProfile()
    {
        if (Auth::guard('customer')->check()) {
            $userId =Auth::guard('customer')->id();
            $customerInfo  = Customer::find($userId);
            $band  = Band::find($customerInfo->band_id);
            $members  = Customer::where('customers.band_id',$customerInfo->band_id)->get();
            return view('frontend.account-band_members', ['band'=>$band,'members' => $members,'customerInfo'=> $customerInfo]);
        }
        else {
            return  redirect()->route('customer.login');
        }
    }
    public function accountProfileUpdate(Request $request){
        $userId = Auth::guard('customer')->id();
        $customer  = Customer::find($userId);

        if ($request->user_image != null) {
            $logoImageName = time() . '_logo.' . $request->user_image->extension();
            $request->user_image->move(public_path('uploads/users/'), $logoImageName);
            $user_image = 'uploads/users/' . $logoImageName;
        } else {
            $user_image = 'uploads/avatar1.png'; // Default image for band_logo
        }
        $customer->user_name  = $request->user_name;
        $customer->name  = $request->name;
        $customer->image  = $user_image;
        $customer->email  = $request->email;
        $customer->address  = $request->address;
        $customer->state  = $request->state;
        $customer->city  = $request->city;
        $customer->save(); 
      
        $customerInfo  = Customer::find($userId);
        return view('frontend.account-home', compact('customerInfo'));
    }

    public function accountProfileBillUpdate(Request $request){
        $userId = Auth::guard('customer')->id();
        $customer  = Customer::find($userId);
        $customer->name_on_card  = $request->name_on_card;
        $customer->cc_number  = $request->cc_number;
        $customer->exp  = $request->exp;
        $customer->exp_year  = $request->exp_year;
        $customer->cvv  = $request->cvv;
        $customer->save(); 
      
        $customerInfo  = Customer::find($userId);
        return view('frontend.account-bill_info', compact('customerInfo'));
    }
    public function accountCustomerChats(Request $request){
        $userId = Auth::guard('customer')->id();
       
        $customerInfo  = Customer::find($userId);
        $chats  = Chat::where('user_id' , $userId)->get();
        //dd($userId);
        return view('frontend.account-message', ['customerInfo'=>$customerInfo,'chats'=>$chats]);
    }
    public function accountSendMsg(Request $request){
        $userId = Auth::guard('customer')->id();
        $chat = New Chat();
        $chat->user_id = $userId;
        $chat->type = 'user';
        $chat->message = $request->message;
        $chat->save();
        return response()->json('success');
    }
    
    
    
}
