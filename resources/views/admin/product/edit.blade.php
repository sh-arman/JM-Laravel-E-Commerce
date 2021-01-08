@extends('admin.layouts.admin-app')
@section('title','Product Edit')
@section('content')

<div class="container">
    <ol class="breadcrumb mb-4 mt-2">
        <li class="breadcrumb-item active">Edit Brand</li>
    </ol>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">

          <label>Product Images</label>
          <div style="border: .5px solid lightgray; border-radius: 5px; padding: 5px; margin-bottom: 2rem;">
            <div class="row" style="">
               @foreach($product->images as $image)
                 <form  for="link" action="{{ route('admin.product.image_delete',['id'=> $image->id]) }}" method="get">
                   @csrf
                 <button id="link" class=" product_image"  type="submit">
                   <p class="product_image_delete"><i class="fa fa-trash" aria-hidden="true"></i></p>
                   <img style="width:100%; height:100%;" src="{{ asset('upload/product/'.$image->image) }}">
                 </button>
               </form>
               @endforeach
             </div>
          </div>


            @include('layouts.error')
            {{-- --}}
            <form action="{{ route('admin.product.update',['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('layouts.error')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" value="{{ $product->title }}" type="text" class="form-control" id="title" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Categories</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach($category as $category)
                        <option value="{{ $category->id }}"
                          @if($product->category_id == $category->id )
                            selected
                          @endif
                        >{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="exampleFormControlSelect3">Select Brand</label>
                    <select name="brand_id" class="form-control" id="exampleFormControlSelect3">
                        @foreach($brand as $brand)
                        <option value="{{ $brand->id }}"
                          @if($product->brand_id == $brand->id )
                            selected
                          @endif
                        >{{ $brand->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label>Select New Images</label>
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
                    <textarea name="description" class="form-control" id="dis" rows="3" >{!! $product->description !!}</textarea>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input name="price" value="{{ $product->price }}" class="form-control">
                </div>

                <div class="form-group">
                    <label >Quantity</label>
                    <input name="quantity" value="{{ $product->quantity }}"   class="form-control">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
            {{-- --}}
        </div>
    </div>
</div>

@endsection
