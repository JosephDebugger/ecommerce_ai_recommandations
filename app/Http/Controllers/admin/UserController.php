<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Contact;
use App\Models\Customer;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.settings.user.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.user.view-add-user');
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
                'unique:users,name', // Unique validation
            ],
            'email' => [
                'nullable',
                'email',
                'max:1000'
            
            ],
            'password' => [
                'nullable',
                'max:1000'
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }
    
    public function show(User $user)
    {
        return view('admin.settings.user.users', compact('user'));
    }

   
    public function edit(User $user)
    {
        return view('admin.settings.user.view-edit-user', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-Z0-9\s]+$/', 
                'unique:brands,name,' . $user->id, // Unique validation, ignoring the current record
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/', 
            ],
            'status' => [
                'required'
            ],
        ]);
        $user->update($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'Brand Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
    public function getUserMessages()
    {
        $messages = Contact::latest()->get();
        return view('admin.settings.user.messages', compact('messages'));
    }
    public function getCustomers()
    {
        $customers = Customer::latest()->get();
        return view('admin.settings.user.customers', compact('customers'));
    }
    public function costomerDestroy($id)
    {
        Customer::find($id)->delete();

        return redirect()->url('crm/customer_list')
            ->with('success', 'Customer deleted successfully.');
    }

    
}
