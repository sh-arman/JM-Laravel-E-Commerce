
<!DOCTYPE html>
<html lang="English">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="JM E-Commerce">
    <meta name="keywords" content="JM, e-commerce, shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}" type="text/css">
    <link href="{{ asset('site/css/toastr.min.css') }}" rel="stylesheet" />

    <!-- Custom css = main.css -->
    <link rel="stylesheet" href="{{ asset('site/css/main.css') }}" type="text/css">
    @yield('style')
</head>
<body>
    <!-- Page Preloder
    <div id="preloder">
        <div class="loader"></div>
    </div>
    -->
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
      <div class="humberger__menu__logo">
        {{-- <a href="#"><img src="img/logo.png" alt=""></a> --}}
        <a href="{{ route('home') }}"><img style="width:40%; height:40%;" src="{{ asset('site/img/Arman.png') }}" alt="JM E-Mart"></a>
        <a href="#">JM E-mart</a>
      </div>
      <!-- number -->
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <!-- end number -->
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
          <ul>
              <li class="active"><a href="{{ route('home') }}">Home</a></li>
              {{-- <li><a href="{{ route('page.product') }}">Product Details</a></li> --}}
              <li><a href="{{ route('page.shoping_cart') }}">Shoping Cart</a></li>
              <li><a href="{{ route('checkout') }}">Check Out</a></li>
              <li><a href="{{ route('page.contact') }}">Contact</a></li>
          </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <!-- <li><i class="fa fa-envelope"></i> hello@colorlib.com</li> -->
                                <li>01947423947 (10AM - 5PM)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                          {{--  --}}
                          <nav class="header__menu ">
                              <ul>
                              @guest
                                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                 @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                 @endif
                              @else
                                @if(Auth::check() && Auth::User()->is_admin == 1)
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                @endif
                                  <li><a href="#">{{ Auth::user()->name }}</a>
                                      <ul class="header__menu__dropdown custom_header_menu_drop">
                                        <li>
                                          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                              {{ __('Logout') }}
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                        </li>
                                      </ul>
                                  </li>
                              @endguest
                            </ul>
                          </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm">
                    <div class="header__logo">
                      <a href="{{ route('home') }}"><img style="width:40%; height:40%;" src="{{ asset('site/img/Arman.png') }}" alt="JM E-Mart"></a>
                      {{-- <a href="{{ route('home') }}"><img src="{{ asset('site/img/logo.png') }}" alt="Home Page"></a> --}}
                    </div>
                </div>
                <div class="col-lg-9">
                  <!-- Search Area -->
                  <div class="hero__search">
                      <div class="hero__search__form">
                          <form action="{{ route('search') }}" method="get">
                              <div class="hero__search__categories">
                                  All Categories <span class="arrow_carrot-down"></span>
                              </div>
                              <input name="search" type="text" placeholder="Search all products here...">
                              <button type="submit" class="site-btn">SEARCH</button>
                          </form>
                      </div>
                      <!--  love & cart -->
                      <div class="header__cart">
                          <ul>
                              <li>
                                <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i>
                                  {{-- @foreach(App\Cart::all() as $c)
                                    <span> {{ $c->quantity }} </span>
                                  @endforeach --}}
                                  <span> {{ App\Cart::count() }} </span>

                                </a>
                              </li>
                              {{-- <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li> --}}
                          </ul>
                          {{--  --}}
                          @php $total_price = 0; @endphp
                          @foreach(App\Cart::totalCarts() as $c)
                              @php $total_price += $c->product->price * $c->quantity; @endphp
                          @endforeach
                          {{--  --}}
                          <div class="header__cart__price">item: <span>{{ $total_price }} tk</span></div>
                      </div>
                      <!-- End love & Cart -->
                  </div>
                    <!-- End Search Area -->
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="{{ Route::currentRouteName() ==='home' ? 'hero' : 'hero hero-normal' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                          <!-- <i class="fa fa-bars"></i> -->
                          <span>All Categories</span>
                        </div>
                      <ul>
                        @foreach(App\Category::orderBy('title','asc')->where('parent_id',NULL)->get() as $parent)
                        <li>
                          <a href="{{ route('category', ['id' => $parent->id])  }}">{{ $parent->title }}
                             @foreach(App\Category::where('parent_id', $parent->id)->get() as $p)
                               <span>&#8594;</span>
                             @endforeach
                             <ul>
                               @foreach(App\Category::orderBy('title','asc')->where('parent_id', $parent->id)->get() as $child)
                                 <li><a href="{{ route('category' , ['id' => $child->id]) }}">{{ $child->title }}</a></li>
                               @endforeach
                             </ul>
                          </a>
                        </li>
                        @endforeach
                      </ul>

                        {{--  --}}
                        {{-- <ul>
                          <!--  -->
                            <li><a href="#">Desktop PC <span>&#8594;</span></a>
                              <ul>
                                <li><a href="#">Gaming PC <span>&#8594;</span></a>
                                  <ul>
                                    <li><a href="#">Ryzen</a></li>
                                    <li><a href="#">Intel</a></li>
                                  </ul>
                                </li>
                                <li><a href="#">Brand PC <span>&#8594;</span></a>
                                  <ul>
                                    <li><a href="#">ASUS</a></li>
                                    <li><a href="#">Lenovo</a></li>
                                    <li><a href="#">HP</a></li>
                                    <li><a href="#">DELL</a></li>
                                    <li><a href="#">ACER</a></li>
                                  </ul>
                                </li>
                                <li><a href="#">Buget PC</a></li>
                                <li><a href="#">Modified PC</a></li>
                                <li><a href="#">All PC</a></li>
                              </ul>
                            </li>

                            <li><a href="#">Laptop & Notebook <span>&#8594;</span></a>
                              <ul>
                                <li><a href="#">ASUS</a></li>
                                <li><a href="#">Razer</a></li>
                                <li><a href="#">Macbook</a></li>
                                <li><a href="#">Lenovo</a></li>
                                <li><a href="#">iZed</a></li>
                                <li><a href="#">HP</a></li>
                                <li><a href="#">DELL</a></li>
                                <li><a href="#">ACER</a></li>
                              </ul>
                            </li>
                            <li><a href="#">Monitor</a></li>
                            <li><a href="#">Accessories <span>&#8594;</span></a>
                              <ul>
                                <li><a href="#">UPS</a></li>
                                <li><a href="#">Component</a></li>
                                <li><a href="#">Gaming</a></li>
                                <li><a href="#">Networking</a></li>
                                <li><a href="#">Servers</a></li>
                              </ul>
                            </li>
                            <li><a href="#">Camera</a></li>
                            <li><a href="#">Equipments <span>&#8594;</span></a>
                              <ul>
                                <li><a href="#">Home Equipments</a></li>
                                <li><a href="#">Office Equipments</a></li>
                              </ul>
                            </li>
                            <!--  -->
                        </ul> --}}
                        {{--  --}}
                    </div>
                </div>
                <div class="col-lg-9">
                  <!-- Pages Links -->
                  <nav class="header__menu">
                      <ul>
                          <li class="active"><a href="{{ route('home') }}">Home</a></li>
                          {{-- <li><a href="{{ route('page.product') }}">Product Details</a></li> --}}
                          <li><a href="{{ route('page.shoping_cart') }}">Shoping Cart</a></li>
                          <li><a href="{{ route('checkout') }}">Check Out</a></li>
                          {{-- <li><a href="#">Pages</a>
                              <ul class="header__menu__dropdown">
                                <li><a href="./blog.html">Blog</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                              </ul>
                          </li> --}}
                      </ul>
                  </nav>
                    <!-- End Pages Links -->
                    <!-- Banner  -->
                    @yield('banner')
                    <!-- End Banner  -->
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                          <a href="{{ route('home') }}"><img style="width:40%; height:40%;" src="{{ asset('site/img/Arman.png') }}" alt="JM E-Mart"></a>
                            {{-- <a href="./index.html"><img src="img/logo.png" alt=""></a> --}}
                        </div>
                        <ul>
                            <li>Address: RK Tower, Banglamotor Dhaka</li>
                            <li>Phone: +880 1947423947</li>
                            <li>Email: armanhassan504.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="{{ route('page.contact') }}">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p>
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script>
                             All rights reserved by <a href="https://armanhassan.tk" target="_blank">Arman</a></p>
                        </div>
                        <div class="footer__copyright__payment"><img src="{{ asset('site/img/payment-item.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Section End -->
  <!-- Js Plugins -->
  <script src="{{ asset('site/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('site/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('site/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('site/js/jquery.slicknav.js') }}"></script>
  <script src="{{ asset('site/js/mixitup.min.js') }}"></script>
  <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('site/js/main.js') }}"></script>
  @yield('script')
  <script src="{{ asset('site/js/toastr.min.js') }}"></script>
  <script>
  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}", ' ', {closeButton: true,progressBar: true, newestOnTop: true})
  @endif

  @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}", ' ', {closeButton: true,progressBar: true, newestOnTop: true})
  @endif

  @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}", ' ', {closeButton: true,progressBar: true, newestOnTop: true})
  @endif

  @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}", ' ', {closeButton: true,progressBar: true, newestOnTop: true})
  @endif
  </script>

</body>
</html>
