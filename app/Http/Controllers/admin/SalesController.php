<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\sale\Sale;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;


class SalesController extends Controller
{
    function getSales(Request $request){
    
        if ($request->ajax()) {
            $query = Sale::select('sales.id', 'sales.total_amount', 'sales.sale_date', 'customers.name', 'customers.email')
                ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $fromDate = Carbon::createFromFormat('Y-m-d', $request->from_date)->startOfDay();
                $toDate = Carbon::createFromFormat('Y-m-d', $request->to_date)->endOfDay();
                $query->whereBetween('sales.sale_date', [$fromDate, $toDate]);
            }
            $sales = $query->get();
          
            return DataTables::of($sales)->addIndexColumn()->make(true);
        }
        $sales = Sale::select('sales.id', 'sales.total_amount', 'sales.sale_date', 'customers.name', 'customers.email')
              ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');

        return  view('admin.sales.sales', ['sales' => $sales]);
    }
    function saleInvoice(Request $request){

    }
}
