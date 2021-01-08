@extends('site/layouts/app')
@section('title','Shoping-cart')
@section('content')

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                   <th>No.</th>
                                    <th class="shoping__product">Products</th>
                                    <th style="text-align:left;">Title</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_price = 0;
                                @endphp
                                @foreach(App\Cart::totalCarts() as $c)
                                  <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                      <td class="shoping__cart__item">
                                          <img src="{{ asset('upload/product/'.$c->product->images->first()->image) }}" alt="{{ $c->product->title }}"  style="width: 100px; height:100px;">
                                      </td>
                                      <td class="shoping__cart__item">
                                          {{ $c->product->title }}
                                      </td>
                                      <td class="shoping__cart__price">
                                          ${{ $c->product->price }}
                                      </td>

                                      <td class="shoping__cart__quantity">
                                          <div class="quantity" style="width:200px;">
                                              <form action="{{ route('cart.update',['id'=> $c->id]) }}" method="POST">
                                                  @csrf
                                                  <div style="display:block; float:left;" class="pro-qty">
                                                      <input  name="quantity" type="number" value="{{ $c->quantity }}">
                                                  </div>

                                                  <button style="display:block; float:right; padding: 8px 9px; background-color:lightgray; border:none;" type="submit"></span>
                                                      Update
                                                  </button>
                                              </form>
                                          </div>
                                      </td>
                                      @php
                                          $total_price += $c->product->price * $c->quantity;
                                      @endphp
                                      <td class="shoping__cart__total">
                                          {{ $c->product->price * $c->quantity }} Tk
                                      </td>
                                      <td class="shoping__cart__item__close">
                                          <form class="" action="{{ route('cart.delete',['id'=> $c->id]) }}" method="post">
                                              @csrf
                                              {{-- <input type="hidden" name="id"> --}}
                                              <button style="border:none; background-color:transparent;" type="submit"><span class="icon_close"></span></button>
                                          </form>

                                      </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('home') }}" class="primary-btn cart-btn cart-btn"><span class="icon_loading"></span> CONTINUE SHOPPING</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right">Checkout</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            {{-- <li>Subtotal <span>$454.98</span></li> --}}
                            <li>Total <span>{{ $total_price }} Tk</span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
