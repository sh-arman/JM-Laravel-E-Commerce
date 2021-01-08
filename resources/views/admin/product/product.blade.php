@extends('admin.layouts.admin-app')
@section('title','Product')
@section('content')
<div class="container-fluid">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary mt-4" data-toggle="modal" data-target="#product">
        Add product
    </button>
    <!-- Modal -->
    <div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="product" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- --}}
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('layouts.error')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Categories</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                              @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Select Brand</label>
                            <select name="brand_id" class="form-control" id="exampleFormControlSelect3">
                              @foreach($brand as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Images</label>
                            <div class="" style="border: .5px solid lightgray; border-radius: 5px; padding: 5px;">
                                <input name="image[]" type="file" class="form-control-file">
                                <input name="image[]" type="file" class="form-control-file">
                                <input name="image[]" type="file" class="form-control-file">
                                <input name="image[]" type="file" class="form-control-file">
                                <input name="image[]" type="file" class="form-control-file">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dis">Description</label>
                            <textarea name="description" class="form-control" id="dis" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="title">Price</label>
                            <input name="price" type="number" class="form-control" id="title" required>
                        </div>

                        <div class="form-group">
                            <label for="title">Quantity</label>
                            <input name="quantity" type="number" class="form-control" id="title" required>
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
        <div class="card-header"><i class="fas fa-table mr-1"></i>products</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($product as $product)
                      <tr>
                       <td style="width:120px; height:120px; padding: 0 !important;">
                        @php $i = 1;  @endphp
                          @foreach($product->images as $image)
                            @if($i > 0)
                              <img style="width:100%; height:100%;" src="{{ asset('upload/product/'.$image->image) }}">
                            @endif
                            @php $i--;  @endphp
                          @endforeach
                        </td>
                            {{-- <td style="width:200px;"><img style="width:200px;" src="{{ asset($product->image) }}" alt="{{ $product->title }}"> </td> --}}
                            <td style="max-width:200px;">{{ $product->title }}</td>
                            <td style="max-width:200px;">{{ $product->category->title }}</td>
                            <td style="max-width:200px;">{{ $product->brand->title }}</td>
                            <td style="max-width:500px;">{{ $product->description }}</td>
                            <td style="max-width:500px;">{{ $product->price }}</td>
                            <td style="max-width:500px;">{{ $product->quantity }}</td>
                            <td style="max-width:20px;">
                                <a href="{{ route('page.product',['slug' => $product->slug]) }}" class="btn btn-sm btn-success" style="margin:2%;">View</a>
                                <a href="{{ route('admin.product.edit', ['id'=>$product->id]) }}" class="btn btn-sm btn-primary" style="margin:2%;">Edit</a>
                                <a href="{{ route('admin.product.delete', ['id'=>$product->id]) }}" class="btn btn-sm btn-danger" style="margin:2%;">Delete</a>
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
