@extends('layouts.backend_master')
@section('Title', 'vendor List')
@section('content')

    {{-- Form  --}}

 <div class="container-fluid">

 
        <div class="card mb-4">
            <div class="card-header py-3">
               Vendor List
                <a href="{{ route('backend.vendor.create') }}" class="btn btn-primary">Create Vendor</a>
            </div>
            <div class="card-body">
                @include('admin.include.flash_message')
                <div class="table-responsive">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th classs="text-danger">#</th>
                                <th>Shop Name</th>
                                <th>Shop Address</th>
                                <th>Shop Slug</th>
                                <th>Shop Descriptio</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                      <tbody>
                       <td></td>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection