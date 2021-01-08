@extends('admin.layouts.admin-app')
@section('title','Edit')
@section('content')

<div class="container">
  <ol class="breadcrumb mb-4 mt-2">
      <li class="breadcrumb-item active">Edit Brand</li>
  </ol>
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12">
  @include('layouts.error')
  <form action="{{ route('admin.brand.update',['id'=> $brand->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input name="title" type="text" value="{{ $brand->title }}" class="form-control" id="title" required >
  </div>

  {{-- <div >Select Sub Categories</div>
  <div style="border: .5px solid lightgray; border-radius:5px; padding:10px; margin-bottom:10px;">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">1</label>
    </div>
  </div> --}}

  <div class="form-group">
   <label for="img">Brand Image</label>
    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" style="border: .5px solid lightgray; border-radius: 5px; padding: 5px;">
  </div>

  <div class="form-group">
     <label for="dis">Description</label>
     <textarea name="description" class="form-control" id="dis" rows="3" required>{{ $brand->description }}
     </textarea>
    </div>

    <button type="submit" value="submit" class="btn btn-primary">Update brand</button>
    </form>
    </div>
  </div>
</div>

@endsection
