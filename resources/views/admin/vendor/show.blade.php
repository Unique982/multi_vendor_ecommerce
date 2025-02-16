@extends('layouts.backend_master')
@section('Title', 'Vendor Detials')
@section('content')

    {{-- Form  --}}

 <div class="container-fluid">

 
        <div class="card mb-4">
            <div class="card-header py-3">
                Vendor Details
                <a href="{{ route('backend.vendor.create') }}" class="btn btn-primary">Vendor Create</a>
                
            </div>
            <div class="card-body">
              
                <div class="table-responsive">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         
                            <tr>
                                <th>User Name</th>
                                <td>{{ $vendors->user->name }}</td>
                            </tr>
                            <tr>
                                <th>User Email</th>
                                <td>{{ $vendors->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Shop Name</th>
                                <td>{{ $vendors->shop_name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $vendors->shop_description }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $vendors->address }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $vendors->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Logo</th>
                                    <td> @if($vendors->logo)
                                        <img src="{{ asset('assets/images/vendor/logos/'.$vendors->logo)}}" alt="No Image" width="10%" height="5%">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Banner</th>
                                    <td> @if($vendors->banner)
                                        <img src="{{ asset('assets/images/vendor/banners/'.$vendors->banner)}}" alt="No Image" width="10%" height="5%">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                    @if($vendors->status=='pending')
                                    <span class="badge badge-success btn btn-sm">Pending</span>
                                    @elseif($vendors->status=='approved')
                                    <span class="badge badge-primary btn btn-sm">Approved</span>
                                    @elseif($vendors->status=='suspended')
                                    <span class="badge badge-danger btn btn-sm">Suspended</span>
                                    @endif
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="7"><a href="{{ route('backend.vendor.index') }}" class="btn btn-primary">Go Back</a></td>
                                </tr>
                         
                         
                        
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection