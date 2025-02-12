@extends('layouts.backend_master')
@section('Title', 'Category Create')
@section('content')

    {{-- Form  --}}

 <div class="container-fluid">

 
        <div class="card mb-4">
            <div class="card-header py-3">
                Category Add
                <a href="{{ route('backend.category.create') }}" class="btn btn-primary">Create Category</a>
            </div>
            <div class="card-body">
                @include('admin.include.flash_message')
                <div class="table-responsive">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th classs="text-danger">#</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                      <tbody>
                        @forelse ($data['records'] as $record)
                            
                       
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->slug }}</td>
                                
                                <td>
                                    <a href="{{route('backend.category.edit',$record->id) }}" class="btn btn-success mb-2 btn-sm">{{ __('Edit') }}</a>
                                    <form action="{{route('backend.category.destroy',$record->id)}}" method="post"  style="display:inline-block">
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
</div>
</div>
@endsection