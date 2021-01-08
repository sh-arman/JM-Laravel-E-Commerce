<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductImage;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // Home page latest products
    public function home()
    {
        $product = Product::orderBy('created_at','desc')->paginate(6);
        return view('home')->with('product', $product)
                              ->with('image', ProductImage::all())
                              ->with('category', Category::all())
                              ->with('brand', Brand::all());
    }
    // // Home page latest products
    // public function home_latest()
    // {
    //     $product = Product::orderBy('created_at','asc')->paginate(6)->get();
    //     return view('welcome')->with('product', $product);
    // }

}
