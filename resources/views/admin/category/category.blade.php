@extends('admin.layouts.admin-app')
@section('title','Create Categories')
@section('content')
<div class="container-fluid">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">
        Add Category
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- --}}
                    @include('layouts.error')
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Parent Category</label>
                              <select name="parent_id" class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled>Please select one option</option>
                                @foreach($main_category as $c)
                                  <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-group">
                         <label for="img">Category Image</label>
                          <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" style="border: .5px solid lightgray; border-radius: 5px; padding: 5px;">
                        </div>

                        <div class="form-group">
                            <label for="dis">Description</label>
                            <textarea name="description" class="form-control" id="dis" rows="3"></textarea>
                        </div>

                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </form>
                    {{-- --}}
                </div>
            </div>
        </div>
    </div>

    {{-- --}}
    <div class="card mb-4 mt-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Categories</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category name</th>
                            <th>Parent Category</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $category)
                        <tr>
                            <td style="width:80px; height:80px; padding:0% !important;"><img src="{{ asset( $category->image) }}" alt="" style="width:100%; height:100%;"> </td>
                            <td style="max-width:200px;">{{ $category->title }}</td>
                            <td style="max-width:500px;">
                              @if ($category->parent_id == NULL)
                                <p class="text-primary">Primary Category</p>
                                 {{-- @elseif(!$category->parent_id == NULL)
                                   {{ $category->title }} --}}
                                 @else
                                   {{ $category->parent->title }}
                              @endif

                            </td>
                            <td style="max-width:20px;">
                                <a href="{{ route('admin.category.edit', ['id'=>$category->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.category.delete', ['id'=>$category->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
