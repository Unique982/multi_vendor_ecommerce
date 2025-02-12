@extends('layouts.backend_master')
@section('Title', 'Category Create')
@section('content')

    {{-- Form  --}}

 <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                Category Add
                
            </div>
            <div class="card-body">
                <form action="{{ route('backend.category.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Category Name')}}</label>
                        <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter  Categoryname">
                        @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="">{{ __('Parent Category')}}</label>
                     <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" value="{{ old('parent_id') }}">
                        <option selected disabled>Select Category</option>
                        @foreach ( $categories as $category )
                        <option value="{{$category->id }}">{{$category->name }}</option>
                            @endforeach
                       
                     </select>
                     @error('parent_id')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Category Slug')}}</label>
                      <textarea name="slug" id="slug" cols="30" rows="10" class="form-control  @error('slug') is-invalid @enderror" value="{{ old('slug') }}"> </textarea>
                      @error('slug')
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
