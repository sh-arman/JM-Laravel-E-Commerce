<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductImage;

class PageController extends Controller
{

  // welcome page without login
  public function index()
  {
      $product = Product::orderBy('created_at','desc')->paginate(12);
      return view('index')->with('product', $product)
                            ->with('image', ProductImage::all())
                            ->with('category', Category::all())
                            ->with('brand', Brand::all());
  }


    public function shop(){
      $product = Product::all();
      $category = Category::all();
      return view('site.shop')->with('product',$product)
                              ->with('category',$category);
    }

    public function product($id){
      // $product = Product::findOrFail($id);
      // $category = Category::where('slug', $slug)->first();
      $product = Product::Where('id',$id)->first();

      return view('site.product')->with('product',$product);
                                 // ->with('category',$category);
    }

    public function checkout(){
      return view('site.checkout');
    }

    public function shoping_cart(){
      return view('site.shoping-cart');
    }

    public function contact(){
      return view('site.contact');
    }
}
