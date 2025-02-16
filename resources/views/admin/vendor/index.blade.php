@extends('layouts.backend_master')
@section('Title', 'Vendor List')
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
                                <th>Slug</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <td>Status</td>

                                <th>Action</th>
                                
                            </tr>
                        </thead>
                      <tbody>
                        @forelse ($vendors as $record)
                            
                       
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                 <td>{{ $record->shop_name }}</td>
                                <td>{{ $record->shop_description }}</td>
                                <td>{{ $record->phone }}</td>
                                <td>{{ $record->address }}</td>
                                {{-- <td>
                                    @if($record->logo)
                                    <img src="{{ asset('assets/images/vendor/logos/'.$record->logo)}}" alt="" width="10%" height="5%">
                                    @endif
                                </td> --}}
                                <td>@if($record->status=='pending')
                                    <span class="badge badge-success btn btn-sm">Pending</span>
                                    @elseif($record->status=='approved')
                                    <span class="badge badge-primary btn btn-sm">Approved</span>
                                    @elseif($record->status=='suspended')
                                    <span class="badge badge-danger btn btn-sm">Suspended</span>
                                    @endif
                                </td>
                                
                                <td>
                                    <a href="{{route('backend.vendor.show',$record->id) }}" class="btn btn-primary mb-2 btn-sm">{{ __('view') }}</a>
                                    <a href="{{route('backend.vendor.edit',$record->id) }}" class="btn btn-success mb-2 btn-sm">{{ __('Edit') }}</a>
                                    <form action="{{route('backend.vendor.destroy',$record->id)}}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-2 btn-sm" onclick="return confirm('Are you Sure')">Delete</button>
                                    </form>
     
                                </td>
                             
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4"><span class="tect-danger">No Record</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection