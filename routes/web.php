<?php

// Route::get('/', function (){ return view('welcome'); })->name('welcome');
Route::view('/', 'welcome')->name('welcome');
Auth::routes();

Route::get('/home','HomeController@home')->name('home');
/*===================== Register & login ===================*/
// Route::get('/register-id','AdminController@register')->name('admin.register');
// Route::get('/login-id','AdminController@login')->name('admin.login');

/*======================= Page routes ======================*/
Route::get('/','PageController@index')->name('index');
Route::get('/shop','PageController@shop')->name('page.shop');
Route::get('/product/{id}','PageController@product')->name('page.product');
// Route::get('/checkout','PageController@checkout')->name('page.checkout');
Route::get('/shoping-cart','PageController@shoping_cart')->name('page.shoping_cart');
Route::get('/contact','PageController@contact')->name('page.contact');

/*======================= Admin routes ======================*/
Route::group(['prefix'=>'admin','middleware'=>'admin','auth'],function(){
  Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');

  /*================== Categories ===========================*/
  Route::group(['prefix'=>'category'],function(){
    Route::get('/','CategoryController@index')->name('admin.category');
    Route::get('/create','CategoryController@create')->name('admin.category.create');
    Route::post('/store','CategoryController@store')->name('admin.category.store');
    Route::get('/edit/{id}','CategoryController@edit')->name('admin.category.edit');
    Route::post('/edit/{id}','CategoryController@update')->name('admin.category.update');
    Route::get('/delete/{id}','CategoryController@delete')->name('admin.category.delete');
  });

  /*================== Brands ===========================*/
  Route::group(['prefix'=>'brand'],function(){
    Route::get('/','BrandController@index')->name('admin.brand');
    Route::get('/create','BrandController@create')->name('admin.brand.create');
    Route::post('/store','BrandController@store')->name('admin.brand.store');
    Route::get('/edit/{id}','BrandController@edit')->name('admin.brand.edit');
    Route::post('/edit/{id}','BrandController@update')->name('admin.brand.update');
    Route::get('/delete/{id}','BrandController@delete')->name('admin.brand.delete');
  });

  /*================== Post  ===========================*/
  Route::group(['prefix'=>'product'],function(){
    Route::get('/','ProductController@index')->name('admin.product');
    Route::get('/create','ProductController@create')->name('admin.product.create');
    Route::post('/store','ProductController@store')->name('admin.product.store');
    Route::get('/edit/{id}','ProductController@edit')->name('admin.product.edit');
    Route::post('/edit/{id}','ProductController@update')->name('admin.product.update');
    Route::get('/delete/{id}','ProductController@delete')->name('admin.product.delete');
    Route::get('/image-delete/{id}','ProductController@image_delete')->name('admin.product.image_delete');
  });
}); // End Admin


/*================== Cart ===========================*/
Route::group(['prefix'=>'cart'],function(){
    Route::get('/','CartController@cart')->name('cart');
    Route::post('/addtocart','CartController@addtocart')->name('addtocart');
    Route::post('/update/{id}','CartController@update')->name('cart.update');
    Route::post('/delete/{id}','CartController@delete')->name('cart.delete');
});


/*================== Checkout ===========================*/
Route::group(['prefix'=>'checkout'],function(){
    Route::get('/','CheckoutController@checkout')->name('checkout');
    Route::post('/store','CheckoutController@store')->name('checkout.store');
});

// Route::post('/addtocart','CartController@addtocart')->name('addtocart');
// Route::post('/update/{id}','CartController@update')->name('cart.update');
// Route::post('/delete/{id}','CartController@delete')->name('cart.delete');

/*====================== SEARCH ========================*/
// welcome page product wise page show
Route::get('/search','SearchController@search')->name('search');
Route::get('/category/{id}','SearchController@category')->name('category');
