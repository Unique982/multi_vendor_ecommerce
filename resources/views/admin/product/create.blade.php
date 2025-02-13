@extends('layouts.backend_master')
@section('Title', 'Product Create')
@section('content')

    {{-- Form  --}}

 <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                Vendor Add
                
            </div>
            <div class="card-body">

                <form action="{{ route('backend.product.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Product Name')}}</label>
                        <input type="text" name="vendor_name"  id="vendor_name" class="form-control @error('vendor_name') is-invalid @enderror" value="{{ old('vendor_name') }}" placeholder="Enter vendor name">
                        @error('vendor_name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
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
