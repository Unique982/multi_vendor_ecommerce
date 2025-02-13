<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors =Vendor::all();
        return view('admin.vendor.create',compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {
        
        $validated = $request->validated();
       $user = User::create([
        'name'=>$request->vendor_name,
        'email'=>$request->vendor_email,
        'password'=>Hash::make($request->vendor_password),
        'role'=>'vendor'

       ]);
       // vendor
   	

      Vendor::create([
        'user_id'=>$user->id,
        'shop_name'=>$request->shop_name,
        'shop_description'=>$request->shop_description,
        'logo'=>$request->logo,
        'banner'=>$request->banner,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'status'=>$request->status,
      

      ]);
      return redirect()->route('admin.vendor.index')->with('success', 'Vendor created successfully!');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
