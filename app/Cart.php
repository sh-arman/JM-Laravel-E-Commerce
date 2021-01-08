<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $fillable = [
      'user_id',
      'product_id',
      'order_id',
      'quantity',
      'ip_address',
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function product(){
      return $this->belongsTo(Product::class);
    }

    public function order(){
      return $this->belongsTo(Order::class);
    }

    // Total cafts
    public static function totalCarts(){
      if(Auth::check()){
        $cart = Cart::orWhere('user_id', Auth::id())
                      ->Where('ip_address', request()->ip())
                      ->get();
       }else{
          $cart = Cart::Where('ip_address', request()->ip())->get();
        }
        return $cart;
      }



    // Total item
    public static function totalItems(){
      if(Auth::check()){
        $cart = Cart::orWhere('user_id', Auth::id())
                      ->Where('ip_address', request()->ip())
                      ->get();
      }else{
        $cart = Cart::Where('ip_address', request()->ip())->get();
      }

      $total_item = 0;
      foreach($cart as $c){
        $total_item += $cart->quantity;
      }
      return $total_item;
    }
}
