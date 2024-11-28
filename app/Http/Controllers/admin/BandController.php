<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Band;
use App\Models\Customer;

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

        Band::create($validatedData);

        return redirect()->route('bands.index')
            ->with('success', 'Band created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $band = Band::find($id);
        return view('admin.inventory.band.view-band', compact('band'));
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
        $band = Band::find($id);
        $band->update($validatedData);

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
        $assignedCustomers = Customer::join('bands', 'bands.id' ,'customers.band_id')
                             ->select('customers.name','customers.email','customers.type','bands.name as bandName','bands.band_logo','bands.contact_email')->get();
        return view('admin.band.assign-bands', compact('assignedCustomers'));
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
        $customer->save();
        return redirect()->route('bandAssign')
            ->with('success', 'Band member successfully assigned.');
    }
    public function editAssignedCustomer($id)
    {
        $bands = Band::latest()->get();
        $customer =  Customer::find($id);
        return view('admin.band.editAssigned-band', ['customer'=> $customer, 'bands'=> $bands]);
    }

    public function  UpdateAssignedCustomer(Request $request)
    {
        $customer =  Customer::find($request->customer);
        $customer->band_id = $request->band;
        $customer->save();
        return redirect()->route('bandAssign')
            ->with('success', 'Band member successfully Edited.');
    }
}
