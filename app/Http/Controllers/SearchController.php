<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Product;

class SearchController extends Controller
{
  // main SEARCH
  public function search(Request $request){

    $search = $request->search;
    $product = Product::orWhere('title', 'like' , '%' . $search . '%')
                      ->orWhere('slug', 'like' , '%' . $search . '%')
                      ->orWhere('description', 'like' , '%' . $search . '%')
                      ->orderBy('title','asc')->paginate(100);
    return view('site.shop')->with('product',$product);
  }

    // product showing by category
    public function category($id){
      $category = Category::findOrFail($id);
      // $product = Product::find($category);

      if($category->count() > 0){
        return view('site.shop')->with('category',$category);
      }else{
        Session::flash('info','No Category found!');
        return back();
      }


    }
}
