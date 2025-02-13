<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records']=Category::all();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
     $validated = $request->validated();
     
   
    $data['records'] = Category::create($request->all());
    if($data){
        $request->session()->flash('success','Category Add Successfully');
    }else {
        $request->session()->flash('error','Failed');
    }
    $data['records']=Category::all();
        return view('admin.category.index',compact('data'));
        
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
        $data['record'] = Category::find($id);
        if($data['record']==null){
            request()->session()->flash('error','Category not found');
            return redirect()->route('admin.category.index');

        }
        $categories=Category::all();
        return view('admin.category.edit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['record'] = Category::find($id);
        if($data['record']==null){
            request()->session()->flash('error','Category not found');
            return view('backend.category.index');  
        }
        $data['record']->update($request->all());
        request()->session()->flash('success', 'Category updated successfully');
        return redirect()->route('backend.category.index');
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,string $id)
    {
        $data['record'] = Category::find($id);
        if($data['record']==null){
            request()->session()->flash('error','Category not found');
            return redirect()->route('backend.category.index');
        }
        else{
            if($data['record']->delete()){
                
                $request->session()->flash('success','Delete Successfully');
            }else {
                $request->session()->flash('error',' Delete Failed');
            }
        }
        return redirect()->route('backend.category.index');
    }
}
