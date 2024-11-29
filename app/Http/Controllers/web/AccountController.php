<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\admin\sale\Sale;
use App\Models\admin\sale\SaleItems;

class AccountController extends Controller
{
    //
    public function accountHome()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->check();
            $customerInfo  = Customer::find($userId);
            return view('frontend.account-home', compact('customerInfo'));
        }
    }

    public function accountBillInfo()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->check();
            $customerInfo  = Customer::find($userId);
            return view('frontend.account-bill_info', compact('customerInfo'));
        }
    }
    public function accountBandSell()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->check();

            $customerInfo  = Customer::find($userId);
            
            $query = SaleItems::select('sale_items.id', 'sale_items.quantity', 'sale_items.total_price', 'customers.name', 'customers.email')
                ->leftJoin('sales', 'sale_items.sales_id', '=', 'sales.id')
                ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');
            $sales = $query->get();

            return view('frontend.account-sales', ['sales' => $sales, 'customerInfo' => $customerInfo]);
        } else {
            return  redirect()->route('customer.login');
        }
    }
}
