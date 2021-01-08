@extends('site/layouts/app')
@section('title','JM E-Mart | Home')

<!-- header Banner  -->
@section('banner')
<div class="hero__item set-bg mt-4" data-setbg="{{ asset('site/img/hero/gaming-mouse.webp') }}">
    <div class="hero__text">
        {{-- <span>FRUIT FRESH</span>
        <h2>Vegetable <br/>100% Organic</h2>
        <p>Free Pickup and Delivery Available</p> --}}
        <a href="#" class="primary-btn" style="margin-top:120%;">SHOP NOW</a>
    </div>
</div>
@endsection
<!-- End header Banner  -->

@section('content')
  <!-- Categories Section -->
  <section class="categories">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-title">
                <h2>Categories</h2>
              </div>
            </div>

            @foreach($category as $c)
            <div class="col-lg-2 col-sm-4">
              <a href="{{ route('category', ['id' => $c->id]) }}">

                <div class="featured__item">
                  <div class="featured__item__pic set-bg" data-setbg="{{ asset( $c->image) }}"></div>
                  <div class="featured__item__text"><h6>{{ $c->title }}</h6></div>
                </div>

              </a>
            </div>
            @endforeach


          </div>
      </div>
  </section>
  <!-- Categories Section End -->

  <!-- Featured Section -->
  <section class="featured spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section-title">
                      <h2>Latest Products</h2>
                  </div>
                  {{-- <div class="featured__controls">
                      <ul>
                          <li class="active" data-filter="*">All</li>
                          <li data-filter=".oranges">Oranges</li>
                          <li data-filter=".fresh-meat">Fresh Meat</li>
                          <li data-filter=".vegetables">Vegetables</li>
                          <li data-filter=".fastfood">Fastfood</li>
                      </ul>
                  </div> --}}
              </div>
          </div>
          <div class="row featured__filter">

            {{--  --}}
          @include('site/partial/product')
            {{--  --}}

              {{--  <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                  <div class="featured__item">
                      <div class="featured__item__pic set-bg" data-setbg="{{ asset('site/img/featured/feature-2.jpg ') }}">
                          <ul class="featured__item__pic__hover">
                              <li><a href="#"><i class="fa fa-heart"></i></a></li>
                              <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                              <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                          </ul>
                      </div>
                      <div class="featured__item__text">
                          <h6><a href="#">Crab Pool Security</a></h6>
                          <h5>$30.00</h5>
                      </div>
                  </div>
              </div> --}}
          </div>
      </div>
  </section>
  <!-- Featured Section End -->

  <!-- Banner -->
  <div class="banner">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="banner__pic">
                      <img src="{{ asset('site/img/banner/dell-keyboard.jpg ') }}" alt="">
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="banner__pic">
                      <img src="{{ asset('site/img/banner/team-ram.jpg ') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Banner End -->

  <!-- Latest Product Section -->
  {{-- <section class="latest-product spad">
    <div class="container">
      <div class="row">
        <!-- latest product -->
        <div class="col-lg-4 d-sm-none d-md-block">
                  <div class="latest-product__text">
                      <h4>Latest Products</h4>
                      <div class="latest-product__slider owl-carousel">
                          <div class="latest-prdouct__slider__item">
                              <a href="#" class="latest-product__item">
                                  <div class="latest-product__item__pic">
                                      <img src="{{ asset('site/img/latest-product/lp-1.jpg') }}" alt="">
                                  </div>
                                   <div class="latest-product__item__text">
                                      <h6>Crab Pool Security</h6>
                                      <span>$30.00</span>
                                  </div>
                              </a>
                              <a href="#" class="latest-product__item">
                                  <div class="latest-product__item__pic">
                                      <img src=" {{ asset('site/img/latest-product/lp-2.jpg') }}" alt="">
                                  </div>
                                  <div class="latest-product__item__text">
                                      <h6>Crab Pool Security</h6>
                                      <span>$30.00</span>
                                  </div>
                              </a>
                              <a href="#" class="latest-product__item">
                                  <div class="latest-product__item__pic">
                                      <img src=" {{ asset('site/img/latest-product/lp-3.jpg') }}" alt="">
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
                                      <img src="{{ asset('site/img/latest-product/lp-1.jpg') }}" alt="">
                                  </div>
                                  <div class="latest-product__item__text">
                                      <h6>Crab Pool Security</h6>
                                      <span>$30.00</span>
                                  </div>
                              </a>
                              <a href="#" class="latest-product__item">
                                  <div class="latest-product__item__pic">
                                      <img src="{{ asset('site/img/latest-product/lp-2.jpg ') }}" alt="">
                                  </div>
                                  <div class="latest-product__item__text">
                                      <h6>Crab Pool Security</h6>
                                      <span>$30.00</span>
                                  </div>
                              </a>
                              <a href="#" class="latest-product__item">
                                  <div class="latest-product__item__pic">
                                      <img src="{{ asset('site/img/latest-product/lp-3.jpg') }}" alt="">
                                  </div>
                                  <div class="latest-product__item__text">
                                      <h6>Crab Pool Security</h6>
                                      <span>$30.00</span>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
        <!-- end latest product -->
        <div class="col-lg-8">
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('site/img/categories/cat-1.jpg') }}">
                        <h5><a href="#">Fresh Fruit</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('site/img/categories/cat-2.jpg') }}">
                        <h5><a href="#">Dried Fruit</a></h5>
                    </div>
                </div>
            </div>
            <div class="">
              <img class="latest_banner__img" src="{{ asset('site/img/banner/banner-2.jpg') }}" alt="">
           </div>
      </div>
    </div>
  </section> --}}
  <!-- Latest Product Section End -->
@endsection
