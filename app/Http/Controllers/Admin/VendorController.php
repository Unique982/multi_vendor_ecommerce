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
         $vendors = Vendor::with('user')->get();
        return view('admin.vendor.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::all();
        return view('admin.vendor.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {

        $validated = $request->validated();
        $user = User::create([
            'name' => $request->vendor_name,
            'email' => $request->vendor_email,
            'password' => Hash::make($request->vendor_password),
            'role' => 'vendor'

        ]);
        // logo file save
        $logoName = null;
        if ($request->hasFile('logo')){
        $logo = $request->file('logo');
        $logoName = time() . '-' . $logo->getClientOriginalName();
        $logo->move(public_path('assets/images/vendor/logos'),$logoName);
        }

        // banner 
        $bannerName = null;
        if ($request->hasFile('banner')){
        $banner = $request->file('banner');
        $bannerName = time() . '-' . $banner->getClientOriginalName();
        $banner->move(public_path('assets/images/vendor/banners'),$bannerName);
        }

        Vendor::create([
            'user_id' => $user->id,
            'shop_name' => $request->shop_name,
            'shop_description' => $request->shop_description,
            'logo' => $logoName,
            'banner' => $bannerName,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.vendor.index')->with('success', 'Vendor created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendors = Vendor::with('user')->findOrFail($id);
        return view('admin.vendor.show', compact('vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendors = Vendor::with('user')->find($id);
        return view('admin.vendor.edit',compact('vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendors = Vendor::with('user')->find($id);
        if($vendors==null){
            return view('admin.vendor.index')->with('error','Venodr Not found');
        }
        // logo file save
     
        
        if ($request->hasFile('logo')){
        $logo = $request->file('logo');
        $logoName = time() . '-' . $logo->getClientOriginalName();
        $logo->move(public_path('assets/images/vendor/logos'),$logoName);
        // upload new remove old img
        if($vendors->logo){
        unlink(public_path('assets/images/vendor/logos/'.$vendors->logo));
        }
    }
        if ($request->hasFile('banner')){
        $banner = $request->file('banner');
        $bannerName = time() . '-' . $banner->getClientOriginalName();
        $banner->move(public_path('assets/images/vendor/banners'),$bannerName);
        if($vendors->banner){
        unlink(public_path('assets/images/vendor/banners/'.$vendors->banner));
        }
        }
        if($vendors){
            return redirect()-> route('backend.vendor.index')->with('success','Update Successfully');
        }
        else{
            return  redirect()->route('bacekend.vendor.index')->with('error','Update Successfully');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $vendors = Vendor::find($id);

       if($vendors==null){
        return view('admin.vendor.index')->with('error','Venodr Not found');
       } 
       if($vendors->banner){
        $bannerPath = public_path('assets/images/vendor/banners/'.$vendors->banner);
        if(file_exists($bannerPath)){
        unlink($bannerPath);
        }
       }
       if($vendors->logo){
        $logoPath = public_path('assets/images/vendor/logos/'.$vendors->logo);
        if(file_exists($logoPath)){
        unlink($logoPath);
       }
    }
     
        if($vendors->delete()){
            return redirect()->route('backend.vendor.index')->with('success','Delete Successfiully');
        }
        else{
            return redirect()->route('backend.vendor.index')->with('error','Delete Faield');
        }
    }
}
    


