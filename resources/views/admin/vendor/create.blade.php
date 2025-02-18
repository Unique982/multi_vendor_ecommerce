@extends('layouts.backend_master')
@section('Title', 'Vendor Create')
@section('content')

    {{-- Form  --}}

 <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                Vendor Add
                
            </div>
            <div class="card-body">
                <form action="{{ route('backend.vendor.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Vendor Name')}}</label>
                        <input type="text" name="vendor_name"  id="vendor_name" class="form-control @error('vendor_name') is-invalid @enderror" value="{{ old('vendor_name') }}" placeholder="Enter vendor name">
                        @error('vendor_name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Email')}}</label>
                        <input type="text" name="vendor_email"  id="vendor_email" class="form-control @error('vendor_email') is-invalid @enderror" value="{{ old('vendor_email') }}" placeholder="Enter vendor name">
                        @error('vendor_email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Phone') }}</label>
                        <input type="number" name="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter Your Number" >
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Address') }}</label>
                        <input type="text" name="address" id="address" class="form-control  @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter Your Address" >
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('Shop Name')}}</label>
                        <input type="text" name="shop_name"  id="shop_name" class="form-control @error('shop_name') is-invalid @enderror" value="{{ old('shop_name') }}" placeholder="Enter  Shopname">
                        @error('shop_name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="">{{ __('Description')}}</label>
                      <textarea name="shop_description" id="shop_description" cols="20" rows="10" class="form-control  @error('shop_description') is-invalid @enderror" value="{{ old('shop_description') }}" placeholder="Enter Description"></textarea>
                      @error('shop_description')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Logo') }}</label>
                        <input type="file" name="logo" id="logo" class="form-control  @error('logo') is-invalid @enderror" value="{{ old('logo') }}" >
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('banner') }}</label>
                        <input type="file" name="banner" id="banner" class="form-control  @error('banner') is-invalid @enderror" value="{{ old('banner') }}" >
                        @error('banner')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  
                    <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror" value="{{ old('status') }}">
                            <option selected disabled>Select Status</option>
                            <option value="pending" {{ old('status') ?'selected':'' }}>Pending</option>
                            <option value="approved" {{ old('status') ?'selected':'' }}>Approved</option>
                            <option value="suspended" {{ old('status') ?'selected':'' }}>Suspended</option>
                        </select>

                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Password')}}</label>
                        <input type="text" name="vendor_password"  id="vendor_password" class="form-control @error('vendor_password') is-invalid @enderror" value="{{ old('vendor_password') }}" placeholder="Enter Password">
                        @error('vendor_password')
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
