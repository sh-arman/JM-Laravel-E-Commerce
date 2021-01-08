@extends('admin.layouts.admin-app')
@section('title','Edit')
@section('content')

<div class="container">
  <ol class="breadcrumb mb-4 mt-2">
      <li class="breadcrumb-item active">Edit Category</li>
  </ol>
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12">
  @include('layouts.error')
  <form action="{{ route('admin.category.update',['id'=> $category->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input name="title" type="text" value="{{ $category->title }}" class="form-control" id="title" required >
  </div>

  <div class="form-group">
      <label for="exampleFormControlSelect1">Select Parent Category</label>
        <select name="parent_id" class="form-control" id="exampleFormControlSelect1">
          <option selected value="{{ $category->parent_id == NULL }}">Primary</option>
          @foreach($main_category as $c)
            <option value="{{ $c->id }}"
              @if($category->parent_id == $c->id )
                selected
              @endif
              >{{ $c->title }}
            </option>
          @endforeach
        </select>
  </div>

  <div class="form-group">
   <label for="img">Category Image</label>
    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" style="border: .5px solid lightgray; border-radius: 5px; padding: 5px;">
  </div>

  <div class="form-group">
     <label for="dis">Description</label>
     <textarea name="description" class="form-control" id="dis" rows="3" required>{{ $category->description }}
     </textarea>
    </div>

    <button type="submit" value="submit" class="btn btn-primary">Update Category</button>
    </form>
    </div>
  </div>
</div>

@endsection
