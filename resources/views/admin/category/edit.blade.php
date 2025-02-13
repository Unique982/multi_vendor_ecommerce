@extends('layouts.backend_master')
@section('Title', 'Category Update')
@section('content')

    {{-- Form  --}}

 <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                Category edit
                
            </div>
            <div class="card-body">
                <form action="{{ route('backend.category.update',$data['record']->id) }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    

                    <div class="form-group">
                        <label for="">{{ __('Category Name')}}</label>
                        <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data['record']->name }}" placeholder="Enter  Categoryname">
                        @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="">{{ __('Parent Category')}}</label>
                     <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" value="{{ $data['record']->parent_id}}">
                        <option selected disabled>Select Category</option>
                        @foreach ( $categories as $category )
                        <option value="{{$category->id }}"{{ $data['record']->parent_id == $category->id ? 'selected': ''}}>
                            {{ $category->name }}
                        </option>
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
                      <textarea name="slug" id="slug" cols="30" rows="10" class="form-control  @error('slug') is-invalid @enderror">{{ $data['record']->slug }} </textarea>
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
