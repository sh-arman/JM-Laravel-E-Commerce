@extends('site/layouts/app')
@section('title','Chekout')
@section('content')

<!-- Breadcrumb Section Begin -->
{{-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">

    </section> --}}
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->


<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            @include('layouts.error')
            <form action="{{ route('checkout.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-5">
                        <div class="checkout__input">
                            <p>Name<span>*</span></p>
                            <input name="name" type="text" value="{{ Auth::check() ? Auth::user()->name : "" }}" required>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input name="address" type="text" placeholder="Street Address" class="checkout__input__add" required>
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input name="city" type="text" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input name="phone_number" type="text" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input name="email" type="text" value="{{ Auth::check() ? Auth::user()->email : "" }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span></span></p>
                            <input name="note" type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>

                        <div class="text-info border border-primary p-4" style="border-radius:  3px;">
                            <p>Cash on delivery you dont have to pay until you get the order received in hands. Just click Confrim order to place order.</p></br>
                            <small>You will get your product in 2-3 buisness days.</small>
                        </div>
                        {{-- <p>Select a Payment Method<span>*</span></p>
                        <div class="checkout__input card">
                            <select class=" " name="method_id" id="payment" >
                                <option>Select a Payment Method</option>

                                @foreach($payment as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                    {{--  --}}
                    {{-- <div class="">
                        @foreach($payment as $method)
                            @if($method->id == 1)
                                <div id="cash"  class="hidden text-info border border-primary p-4">
                                    <p>In Cash on delivery you dont have to pay until you get the order received in hands. Just click Confrim order to place order.</p></br>
                                    <small>You will get your product in 2-3 buisness days.</small>
                                </div>
                                @else
                                <div id="bkash" class=" hidden text-info border border-primary p-4">
                                    <strong>{{ $method->name }} - Payment </br></strong>
                                    <strong>Account Type: Personal </br></strong>
                                    Bkash Number : <span class="text-danger">{{ $method->no }} </span> </br>
                                    *<span class="text-danger">Please type your name in bkash reference. </span></br>

                                    <div class="checkout__input">
                                        <p>Enter your transection number here<span>*</span></p>
                                        <input name="transaction_id" type="text" placeholder="088 01..." ></br>
                                    </div>
                                    </br><small>You will get your product in 2-3 buisness days.</small>
                                </div>
                                @endif
                        @endforeach
                    </div> --}}
                    {{--  --}}

                    </div>




                    <div class="col-lg-5 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            @php $total_price = 0;
                            @endphp
                            @foreach(App\Cart::totalCarts() as $c)
                            {{-- @php $total_price += $c->product->price * $c->quantity; @endphp --}}
                            <ul>
                                <li>{{ $c->product->title }}<span>{{ $c->product->price }}Tk</span></li>
                            </ul>

                            @php $total_price += $c->product->price * $c->quantity;
                            @endphp
                            @endforeach
                            {{-- <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div> --}}
                            <div class="checkout__order__total">Total <span>{{ $total_price }} Tk</span></div>
                            <div class="checkout__input__checkbox">
                                <a href="{{ route('register') }}">Create an account?</a>
                            </div>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p> --}}
                                {{-- <button type="submit" name="button">submit</button> --}}
                            <button type="submit" class="site-btn">Confirm Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection

@section('script')
<script type="text/javascript">
    $("#payment").change(function() {
        $method = $('#payment').val();
        if($method == 1){
            $("#cash").removeClass('hidden');
            $("#bkash").addClass('hidden');
        }else{
            $("#bkash").removeClass('hidden');
            $("#cash").addClass('hidden');
        }

    })
</script>

@endsection
