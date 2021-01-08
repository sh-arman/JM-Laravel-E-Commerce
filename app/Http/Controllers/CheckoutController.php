<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Method;
use App\Order;
use Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('site.checkout');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $order = new Order;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->note = $request->note;
        $order->ip_address = $request->ip();
        if(Auth::check()) {
            $order->user_id = Auth::id();
        }

        dd($order);
        $order->save();
        return back();

    }
}
