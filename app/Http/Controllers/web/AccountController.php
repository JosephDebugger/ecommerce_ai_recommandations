<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\admin\sale\Sale;
use App\Models\admin\sale\SaleItems;
use App\Models\admin\Band;

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

            $query = SaleItems::select('sale_items.id','products.name as product_name', 'sale_items.quantity','sales.sale_date', 'sale_items.total_price', 'customers.name', 'customers.email')
                ->leftJoin('sales', 'sale_items.sales_id', '=', 'sales.id')
                ->leftJoin('products', 'sale_items.product_id', '=', 'products.id')
                ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id')
                ->where('products.band_id', $customerInfo->band_id);
            $sales = $query->get();

            return view('frontend.account-sales', ['sales' => $sales, 'customerInfo' => $customerInfo]);
        } else {
            return  redirect()->route('customer.login');
        }
    }
    public function accountCustomerSalesOrder()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();

            $customerInfo  = Customer::find($userId);

            $query = Sale::select('sales.id', 'sales.total_amount', 'sales.sale_date', 'customers.name', 'customers.email')
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
        $customer->name  = $request->name;
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
    
}
