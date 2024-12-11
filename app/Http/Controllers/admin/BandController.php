<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Band;
use App\Models\Customer;
use App\Models\admin\sale\Sale;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bands = Band::latest()->get();
        return view('admin.band.bands', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.band.view-add-band');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/', // Alphanumeric validation
                'unique:bands,name', // Unique validation
            ],
            'details' => [
                'nullable',
                'string',
                'max:1000',
                'regex:/^[a-zA-Z0-9\s]+$/', // Alphanumeric validation
            ],
       
            'contact_email' => [
                'nullable',
                'email',
                'max:255'
            ],
            'contact_phone' => [
                'required',
                'string',
                'max:255'
            ],
            'band_logo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            'band_cover' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        ]);

        if ($request->band_logo != null) {
            $imageName = time() . '.' . $request->band_logo->extension();
            $request->band_logo->move(public_path('uploads/bands/'), $imageName);
            $imagePath = 'uploads/bands/' . $imageName;
            $band_logo = $imagePath;
        } else {
            $imagePath = 'uploads/images.png';
        }
        
        if ($request->band_cover != null) {
            $imageName = time() . '.' . $request->band_cover->extension();
            $request->band_cover->move(public_path('uploads/bands/'), $imageName);
            $imagePath = 'uploads/bands/' . $imageName;
            $band_cover = $imagePath;
        } else {
            $imagePath = 'uploads/images.png';
        }


        //Band::create($validatedData);
        $band = new Band;
        $band->name = $request->input('name');
        $band->details = $request->input('details');
        $band->contact_email = $request->input('contact_email');
        $band->contact_phone = $request->input('contact_phone');
        $band->band_logo = $band_logo;
        $band->band_cover = $band_cover;
        $band->save();


        return redirect()->route('bands.index')
            ->with('success', 'Band created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $band = Band::find($id);
        return view('admin.band.view-band', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $band = Band::find($id);
        return view('admin.band.view-edit-band', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-Z0-9\s]+$/', 
                'unique:bands,name,' . $id, // Unique validation, ignoring the current record
            ],
            'details' => [
                'nullable',
                'string',
                'max:1000',
                'regex:/^[a-zA-Z0-9\s]+$/', // Alphanumeric validation
            ],
       
            'contact_email' => [
                'nullable',
                'email',
                'max:255'
            ],
            'contact_phone' => [
                'required',
                'string',
                'max:255'
            ],
            'band_logo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            'band_cover' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            'status' => [
                'required'
            ],
        ]);

        if ($request->band_logo != null) {
            $logoImageName = time() . '_logo.' . $request->band_logo->extension();
            $request->band_logo->move(public_path('uploads/bands/'), $logoImageName);
            $band_logo = 'uploads/bands/' . $logoImageName;
        } else {
            $band_logo = 'uploads/images.png'; // Default image for band_logo
        }
        
        if ($request->band_cover != null) {
            $coverImageName = time() . '_cover.' . $request->band_cover->extension();
            $request->band_cover->move(public_path('uploads/bands/'), $coverImageName);
            $band_cover = 'uploads/bands/' . $coverImageName;
        } else {
            $band_cover = 'uploads/images.png'; // Default image for band_cover
        }


        $band = Band::find($id);
     
        $band->name = $request->input('name');
        $band->details = $request->input('details');
        $band->contact_email = $request->input('contact_email');
        $band->contact_phone = $request->input('contact_phone');
        $band->band_logo = $band_logo;
        $band->band_cover = $band_cover;
        $band->update();


        return redirect()->route('bands.index')
            ->with('success', 'Band Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $band = Band::find($id);
        $band->delete();

        return redirect()->route('bands.index')
            ->with('success', 'Band deleted successfully.');
    }


    public function bandAssign(){
        $bands = Band::latest()->get();
        $customers =  Customer::latest()->get();
        $assignedCustomers = Customer::join('bands', 'bands.id' ,'customers.band_id')
                             ->select('customers.id','customers.name','customers.email','customers.type','bands.name as bandName','bands.band_logo','bands.contact_email')->paginate();
        return view('admin.band.assign-bands', ['assignedCustomers'=>$assignedCustomers,'customers'=>$customers,'bands'=>$bands]);
    }

    
    public function bandAssignStore(Request $request)
    {
        $validatedData = $request->validate([
            'customer' => [
                'required',
            ],
            'band' => [
                'required',
            ],
        ]);

        $customer =  Customer::find($request->customer);
        $customer->band_id = $request->band;
        $customer->type = 'band';
        $customer->save();
        return redirect()->route('bandAssign')
            ->with('success', 'Band member successfully assigned.');
    }
    public function editAssignedCustomer($id)
    {
        $bands = Band::latest()->get();
        $customerInfo =  Customer::select('band_id', 'id')->find($id);
        $customers =  Customer::latest()->get();
        return view('admin.band.editAssigned-band', ['customers'=> $customers, 'bands'=> $bands,'customerInfo'=> $customerInfo]);
    }

    public function  UpdateAssignedCustomer(Request $request)
    {
        $customer =  Customer::find($request->customer);
        $customer->band_id = $request->band;
        $customer->save();
        return redirect()->route('bandAssign')
            ->with('success', 'Band member successfully Edited.');
    }


    function getBandSales(Request $request)
    {

        if ($request->ajax()) {
            $query = Sale::select('sales.id', 'sales.total_amount', 'sales.sale_date', 'sales.status','customers.name', 'customers.email')
                ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $fromDate = Carbon::createFromFormat('Y-m-d', $request->from_date)->startOfDay();
                $toDate = Carbon::createFromFormat('Y-m-d', $request->to_date)->endOfDay();
                $query->whereBetween('sales.sale_date', [$fromDate, $toDate]);
            }
            $query->where('customers.band_id','>',0);
            $sales = $query->get();

            return DataTables::of($sales)->addIndexColumn()->make(true);
        }
        $sales = Sale::select('sales.id', 'sales.total_amount','sales.status', 'sales.sale_date', 'customers.name', 'customers.email')
            ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id')->where('customers.band_id','>',0)->get();

        return view('admin.band.bandSales', ['sales' => $sales]);
    }
}
