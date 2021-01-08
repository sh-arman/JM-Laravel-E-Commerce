<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Order;
use Session;


class CartController extends Controller
{
    // cart item show in page
    public function cart(){
      $cart = Cart::all();
      return view('site.shoping-cart')->with('cart',$cart);
    }




    // add to cart
    public function addtocart(Request $request){
      $this->validate($request,[
        'product_id' =>'required'
      ]);

      $cart = Cart::Where('product_id', $request->product_id)
                  ->first();

      if(!is_null($cart)){
        $cart->increment('quantity');
      }else{
        $cart = new Cart();
        if(Auth::check()){
          $cart->user_id = Auth::id();
        }
        $cart->product_id = $request->product_id;
        $cart->ip_address = request()->ip();
        $cart->save();
      }

      return back();
    }


    public function update(Request $request, $id){
        $cart = Cart::findOrFail($id);
        if(!is_null($cart)){
            $cart->quantity = $request->quantity;
            $cart->save();
            Session::flash('success','Cart Succesfully Updated');
            return back();
        }else{
            return back();
        }
    }


    public function delete($id){
        $cart = Cart::findOrFail($id);
        if(!is_null($cart)){
            $cart->delete();
            return back();
        }else{
            return back();
        }
    }




}
