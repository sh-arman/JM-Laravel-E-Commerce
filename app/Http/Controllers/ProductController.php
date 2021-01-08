<?php

namespace App\Http\Controllers;

use Session;
use File;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
      $product = Product::orderBy('created_at','desc')->get();
      return view('admin.product.product')->with('product', $product)
                                          ->with('image', ProductImage::all())
                                          ->with('category', Category::all())
                                          ->with('brand', Brand::all());
  }

  public function create()
  {
      return view('admin.product.create');
  }


  public function store(Request $request)
  {
      $this->validate($request,[
        'title'=> 'required|max:200',
        'category_id'=> 'required',
        'description'=> 'required',
        'price'=> 'required',
        'quantity'=> 'required',
      ]);
      $product = Product::create([
        'title'=> $request->title,
        'category_id'=> $request->category_id,
        'brand_id'=> $request->brand_id,
        'slug'=> str_slug($request->title),
        // 'image'=> 'upload/product/' . $image_new_name,
        'description'=> $request->description,
        'price'=> $request->price,
        'offer_price'=> $request->offer_price,
        'quantity'=> $request->quantity
      ]);

      if(count($request->image) > 0) {
        foreach ($request->image as $image) {
          $image_new_name = time().'-'.$image->getClientOriginalName();
          $image->move('upload/product/',$image_new_name);
          $product_image = new ProductImage;
          $product_image->product_id = $product->id;
          $product_image->image = $image_new_name;
          // $product->slug = str_slug($product->title);
          $product_image->save();
          }
       }
      Session::flash('success','product Succesfully Created');
      return back();
  }

  public function edit($id)
  {
      $product = Product::findOrFail($id);
      return view('admin.product.edit')->with('product', $product)
                                        ->with('image', ProductImage::all())
                                        ->with('category', Category::all())
                                        ->with('brand', Brand::all());
  }

  public function update(Request $request, $id)
  {
    $product = Product::findOrFail($id);

    if($request->hasFile('image')) {
      foreach ($request->image as $image) {
        $image_new_name = time().'-'.$image->getClientOriginalName();
        $image->move('upload/product/',$image_new_name);
        $product_image = new ProductImage;
        $product_image->product_id = $product->id;
        $product_image->image = $image_new_name;
        $product_image->save();
        }
     }
     $product->fill([
       'title'=> $request->title,
       'category_id'=> $request->category_id,
       'brand_id'=> $request->brand_id,
       'slug'=> str_slug($request->title),
       // 'image'=> 'upload/product/' . $image_new_name,
       'description'=> $request->description,
       'price'=> $request->price,
       'offer_price'=> $request->offer_price,
       'quantity'=> $request->quantity
     ])->save();

    Session::flash('success','product Succesfully Updated');
    return back();
  }

  public function delete($id)
  {
      $product = Product::findOrFail($id);
      // $product_image_path = 'upload/product/'. $product->image;
      // unlink($product_image_path);
      $product->delete();
      Session::flash('error','product Succesfully Deleted');
      return back();
  }

//project edit page images delete option
  public function image_delete($id)
  {
    $product = ProductImage::findOrFail($id);
    $product_image_path = 'upload/product/' . $product->image;
    unlink($product_image_path);
    $product->delete();
    Session::flash('error','Product Image Succesfully Deleted');
    return back();
  }
}
