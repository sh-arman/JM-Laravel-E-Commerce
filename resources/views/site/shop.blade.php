@extends('site/layouts/app')
@section('title','Shop')
@section('content')
<!-- Product Section Begin -->
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    {{-- <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                <li><a href="#">Fresh Meat</a></li>
                                <li><a href="#">Vegetables</a></li>
                                <li><a href="#">Fruit & Nut Gifts</a></li>
                                <li><a href="#">Fresh Berries</a></li>
                                <li><a href="#">Ocean Foods</a></li>
                                <li><a href="#">Butter & Eggs</a></li>
                                <li><a href="#">Fastfood</a></li>
                                <li><a href="#">Fresh Onion</a></li>
                                <li><a href="#">Papayaya & Crisps</a></li>
                                <li><a href="#">Oatmeal</a></li>
                            </ul>
                        </div> --}}
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="500000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- side bar --}}
                    {{-- <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>   --}}
                    {{-- End side bar --}}
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                {{-- <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('site/img/product/discount/pd-1.jpg') }}">
                <div class="product__discount__percent">-20%</div>
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__discount__item__text">
                <span>Dried Fruit</span>
                <h5><a href="#">Raisin’n’nuts</a></h5>
                <div class="product__item__price">$30.00 <span>$36.00</span></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="product__discount__item">
            <div class="product__discount__item__pic set-bg" data-setbg="{{ asset('site/img/product/discount/pd-2.jpg') }}">
                <div class="product__discount__percent">-20%</div>
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__discount__item__text">
                <span>Vegetables</span>
                <h5><a href="#">Vegetables’package</a></h5>
                <div class="product__item__price">$30.00 <span>$36.00</span></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="product__discount__item">
            <div class="product__discount__item__pic set-bg" data-setbg="{{ asset('site/img/product/discount/pd-3.jpg') }}">
                <div class="product__discount__percent">-20%</div>
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__discount__item__text">
                <span>Dried Fruit</span>
                <h5><a href="#">Mixed Fruitss</a></h5>
                <div class="product__item__price">$30.00 <span>$36.00</span></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="product__discount__item">
            <div class="product__discount__item__pic set-bg" data-setbg="{{ asset('site/img/product/discount/pd-4.jpg') }}">
                <div class="product__discount__percent">-20%</div>
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__discount__item__text">
                <span>Dried Fruit</span>
                <h5><a href="#">Raisin’n’nuts</a></h5>
                <div class="product__item__price">$30.00 <span>$36.00</span></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="product__discount__item">
            <div class="product__discount__item__pic set-bg" data-setbg="{{ asset('site/img/product/discount/pd-5.jpg') }}">
                <div class="product__discount__percent">-20%</div>
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__discount__item__text">
                <span>Dried Fruit</span>
                <h5><a href="#">Raisin’n’nuts</a></h5>
                <div class="product__item__price">$30.00 <span>$36.00</span></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="product__discount__item">
            <div class="product__discount__item__pic set-bg" data-setbg="{{ asset('site/img/product/discount/pd-6.jpg') }}">
                <div class="product__discount__percent">-20%</div>
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__discount__item__text">
                <span>Dried Fruit</span>
                <h5><a href="#">Raisin’n’nuts</a></h5>
                <div class="product__item__price">$30.00 <span>$36.00</span></div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div> --}}
    <div class="filter__item">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="filter__sort">
                    <span>Sort By</span>
                    <select>
                        <option value="0">Default</option>
                        <option value="0">Name A - Z</option>
                        <option value="1">Price low - High</option>
                        <option value="2">Price High - low</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="filter__sort">
                    <span>Products By</span> <b><span class="text-dark">{{ $category->title }}</span></b>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @php
        $product = $category->Products()->paginate(100);
        @endphp
        @if ($product->count() > 0)
        @include('site/partial/product')
        @else
        <div class="alert alert-warning" role="alert">
            Sorry No Product Found in This category <b>{{ $category->title }}</b>
        </div>
        @endif



        {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('site/img/product/product-1.jpg') }}">
        <ul class="product__item__pic__hover">
            <li><a href="#"><i class="fa fa-heart"></i></a></li>
            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>
    </div>
    <div class="product__item__text">
        <h6><a href="#">Crab Pool Security</a></h6>
        <h5>$30.00</h5>
    </div>
    </div>
    </div> --}}

    </div>
    <div class="product__pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
    </div>
    </div>
    </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
