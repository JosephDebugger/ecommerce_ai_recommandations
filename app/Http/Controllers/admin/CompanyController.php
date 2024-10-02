<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\settings\Company;

class CompanyController extends Controller
{
    public function getSettings()
    {
        $company = Company::find(1);
        return view('admin.settings.company.companySettingForm', compact('company'));
    }

    public function setSettings(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'uploads/company/' . $imageName;

        $Company =  Company::find($id);
        $Company->company_name = $request->input('company_name');
        $Company->email = $request->input('email');
        $Company->phone = $request->input('phone');
        $Company->address = $request->input('address');
        $Company->description = $request->input('description');
        $Company->logo = $imagePath;
        $Company->status = 'Active';
        $Company->save();
   
        return redirect()->route('company-setting')
            ->with('success', 'Company Information Updated successfully.');
    }
}
