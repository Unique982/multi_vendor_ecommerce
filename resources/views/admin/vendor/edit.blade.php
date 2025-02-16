@extends('layouts.backend_master')
@section('Title', 'Vendor Update')
@section('content')

    {{-- Form  --}}

 <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                Vendor Update
            </div>
            <div class="card-body">
                <form action="{{ route('backend.vendor.update',$vendors->id) }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('Vendor Name')}}</label>
                        <input type="text" name="vendor_name"  id="vendor_name" class="form-control @error('vendor_name') is-invalid @enderror" value="{{ $vendors->user->name}}" placeholder="Enter vendor name">
                        @error('vendor_name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Email')}}</label>
                        <input type="text" name="vendor_email"  id="vendor_email" class="form-control @error('vendor_email') is-invalid @enderror" value="{{ $vendors->user->email}}" placeholder="Enter vendor name">
                        @error('vendor_email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Phone') }}</label>
                        <input type="number" name="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{ $vendors->phone }}" placeholder="Enter Your Number" >
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Address') }}</label>
                        <input type="text" name="address" id="address" class="form-control  @error('address') is-invalid @enderror" value="{{ $vendors->address }}" placeholder="Enter Your Address" >
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Shop Name')}}</label>
                        <input type="text" name="shop_name"  id="shop_name" class="form-control @error('shop_name') is-invalid @enderror" value="{{ $vendors->shop_name }}" placeholder="Enter  Shopname">
                        @error('shop_name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Description')}}</label>
                      <textarea name="shop_description" id="shop_description" cols="20" rows="10" class="form-control  @error('shop_description') is-invalid @enderror"  placeholder="Enter Description">{{ $vendors->shop_description }}</textarea>
                      @error('shop_description')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Logo') }}</label>
                        @if($vendors->logo)
                        <div class="mb-2">
                            <img src="{{ asset('assets/images/vendor/logos/'.$vendors->logo)}}" alt="No Image" width="10%" height="5%">
                        </div>                
                        @endif
                        <input type="file" name="logo" id="logo" class="form-control  @error('logo') is-invalid @enderror" >
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('banner') }}</label>
                        @if($vendors->banner)
                        <div class="mb-2">
                        <img src="{{ asset('assets/images/vendor/banners/'.$vendors->banner)}}" alt="current Banner" width="30%" height="10%">
                        </div>
                        @endif
                        <input type="file" name="banner" id="banner" class="form-control  @error('banner') is-invalid @enderror">
                        @error('banner')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror">
                            <option selected disabled>Select Status</option>
                            <option value="pending" {{ $vendors->status=='pending' ? 'selected':'' }}>Pending</option>
                            <option value="approved" {{ $vendors->status=='approved' ?'selected':'' }}>Approved</option>
                            <option value="suspended" {{ $vendors->status=='suspended' ?'selected':'' }}>Suspended</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="{{ route('backend.vendor.index') }}"><button class="btn btn-danger" type="button">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
