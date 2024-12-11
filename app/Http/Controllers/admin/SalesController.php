<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\sale\Sale;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    function getSales(Request $request)
    {

        if ($request->ajax()) {
            $query = Sale::select('sales.id', 'sales.total_amount', 'sales.sale_date','sales.status', 'customers.name', 'customers.email')
                ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $fromDate = Carbon::createFromFormat('Y-m-d', $request->from_date)->startOfDay();
                $toDate = Carbon::createFromFormat('Y-m-d', $request->to_date)->endOfDay();
                $query->whereBetween('sales.sale_date', [$fromDate, $toDate]);
            }
            $sales = $query->get();

            return DataTables::of($sales)->addIndexColumn()->make(true);
        }
        $sales = Sale::select('sales.id', 'sales.total_amount', 'sales.status','sales.sale_date', 'customers.name', 'customers.email')
            ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');

        return view('admin.sales.sales', ['sales' => $sales]);
    }
    function sendProduct(Request $request)
    {

        $sales =  Sale::find($request->salesId);
        $sales->status = $request->status;
        $sales->save();
        return response()->json('success');
    }
    public function getSalesData()
    {
        $sales = DB::table('sales')
            ->select('sale_date', DB::raw('SUM(total_amount) as total_amount'))
            ->groupBy('sale_date')
            ->get();
        return response()->json($sales);
    }
}
