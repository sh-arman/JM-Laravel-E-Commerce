@extends('admin.layouts.admin-app')
@section('title','Brand')
@section('content')
<div class="container-fluid">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary mt-4" data-toggle="modal" data-target="#brand">
        Add Brand
    </button>
    <!-- Modal -->
    <div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="brand" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- --}}
                    @include('layouts.error')
                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" required>
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
                            <textarea name="description" class="form-control" id="dis" rows="3" ></textarea>
                        </div>

                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </form>
                    {{-- --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- --}}
    <div class="card mb-4 mt-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Brands</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand as $brand)
                        <tr>
                            <td style="width:80px; height:80px; padding:1% !important;"><img style="width:100%; height:100%;" src="{{ asset($brand->image) }}" alt="{{ $brand->title }}"> </td>
                            <td style="max-width:200px;">{{ $brand->title }}</td>
                            <td style="max-width:500px;">{{ $brand->description }}</td>
                            <td style="max-width:20px;">
                                <a href="{{ route('admin.brand.edit', ['id'=>$brand->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.brand.delete', ['id'=>$brand->id]) }}" class="btn btn-sm btn-danger">Danger</a>
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
