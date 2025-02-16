@extends('layouts.backend_master')
@section('Title', 'Product Create')
@section('content')

    {{-- Form  --}}

 <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                Product Add
                
            </div>
            <div class="card-body">

                <form action="{{ route('backend.product.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                  
                        <div class="form-group">
                        <label for="">{{ __("Product Name") }}</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter  Productname">
                         @error('name')
                         <span class="invalid-feedback" role="alert"></span>
                         <strong>{{ $message }}</strong>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Product Slug") }}</label>
                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Enter  Product Slug">
                         @error('slug')
                         <span class="invalid-feedback" role="alert"></span>
                         <strong>{{ $message }}</strong>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Product Description") }}</label>
                        <textarea name="description" id="description" cols="20" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea> 
                         @error('description')
                         <span class="invalid-feedback" role="alert"></span>
                         <strong>{{ $message }}</strong>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Product Price") }}</label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Enter Product Price">
                         @error('price')
                         <span class="invalid-feedback" role="alert"></span>
                         <strong>{{ $message }}</strong>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Product Discount") }}</label>
                        <input type="number" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" placeholder="Enter  Product Discount">
                         @error('discount')
                         <span class="invalid-feedback" role="alert"></span>
                         <strong>{{ $message }}</strong>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Product Status") }}</label>
                       <select name="status" id="status" class="form-control">
                        <option selected disabled>Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                       </select>
                         @error('status')
                         <span class="invalid-feedback" role="alert"></span>
                         <strong>{{ $message }}</strong>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Product Stock") }}</label>
                        <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" placeholder="Enter  Product Stock">
                         @error('stock')
                         <span class="invalid-feedback" role="alert"></span>
                         <strong>{{ $message }}</strong>
                         @enderror
                    </div>
                  
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
                        <input type="reset" class="btn btn-danger" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
