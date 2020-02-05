<?php

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//首頁
Route::get('/','FrontController@index');

// 徵才訊息篩選
Route::get('/job/{id}','FrontController@select');


Auth::routes();

// 購物車

Route::post('/addCart','CartController@addCart'); //加入購物車
Route::post('/cartQtyAdd','CartController@cartQtyAdd'); // 商品 +1按鈕
Route::post('/cartQtyMinus','CartController@cartQtyMinus'); // 商品 -1按鈕
Route::post('/cartQtyChange','CartController@cartQtyChange'); // 商品數量修改
Route::post('/cartDelete','CartController@cartDelete'); // 商品數量刪除
Route::get('/cartCheck','CartController@cartCheck'); // 結帳輸入購買資訊
Route::post('/cartPayment','CartController@cartPayment'); // 存訂單 帶金流
Route::get('/cartPaid/{order_no}','CartController@cartPaid'); // 完成結帳畫面

Route::get('/cart', 'CartController@cart')->middleware('auth'); //進入購物車 (要透過middleware篩選是否為會員 是才會進去)

// 串接金流

Route::prefix('cart_ecpay')->group(function(){

    //當消費者付款完成後，綠界會將付款結果參數以幕後(Server POST)回傳到該網址。
    Route::post('notify', 'CartController@notifyUrl')->name('notify');

    //付款完成後，綠界會將付款結果參數以幕前(Client POST)回傳到該網址
    Route::post('return', 'CartController@returnUrl')->name('return');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){
    // 首頁
    Route::get('/', 'AdminController@index')->name('admin');

    // Banner管理
    Route::get('/banner', 'BannerController@index');
    Route::get('/banner/create', 'BannerController@create');
    Route::post('/banner/store', 'BannerController@store');
    Route::get('/banner/edit/{id}', 'BannerController@edit');
    Route::post('/banner/update/{id}', 'BannerController@update');
    Route::post('/banner/destroy/{id}', 'BannerController@destroy');


    // 訂單管理
    Route::get('/order', 'OrderController@index');
    Route::get('/order/detail/{order_no}', 'OrderController@detail');
    Route::post('/order/destroy/{order_no}', 'OrderController@destroy');
    Route::get('/order/select/{status}', 'OrderController@select'); // 訂單篩選
    Route::post('/orderChangeStatus/{order_no}', 'OrderController@changeStatus'); //修改訂單狀態

    // 社群管理
    Route::get('/social', 'SocialController@index');
    Route::get('/social/create', 'SocialController@create');
    Route::post('/social/store', 'SocialController@store');
    Route::get('/social/edit/{id}', 'SocialController@edit');
    Route::post('/social/update/{id}', 'SocialController@update');
    Route::post('/social/destroy/{id}', 'SocialController@destroy');


});

// 後台
Route::group(['prefix' => 'admin', 'middleware' => ['auth','super_admin']], function(){



    // 菜單類別管理
    Route::get('/product_type', 'ProductTypeController@index'); // 列表頁
    Route::get('/product_type/create', 'ProductTypeController@create');
    Route::post('/product_type/store', 'ProductTypeController@store');
    Route::get('/product_type/edit/{id}', 'ProductTypeController@edit');
    Route::post('/product_type/update/{id}', 'ProductTypeController@update');
    Route::post('/product_type/destroy/{id}', 'ProductTypeController@destroy');

    // 最新消息管理
    Route::get('/news', 'NewsController@index');
    Route::get('/news/create', 'NewsController@create');
    Route::post('/news/store', 'NewsController@store');
    Route::get('/news/edit/{id}', 'NewsController@edit');
    Route::post('/news/update/{id}', 'NewsController@update');
    Route::post('/news/destroy/{id}', 'NewsController@destroy');

    // 產品管理
    Route::get('/product', 'ProductController@index');
    Route::get('/product/create', 'ProductController@create');
    Route::post('/product/store', 'ProductController@store');
    Route::get('/product/edit/{id}', 'ProductController@edit');
    Route::post('/product/update/{id}', 'ProductController@update');
    Route::post('/product/destroy/{id}', 'ProductController@destroy');
    Route::get('/product/select/{type_name}','ProductController@select');

    // 分店城市管理
    Route::get('/location_city', 'LocationCityController@index');
    Route::get('/location_city/create', 'LocationCityController@create');
    Route::post('/location_city/store', 'LocationCityController@store');
    Route::get('/location_city/edit/{id}', 'LocationCityController@edit');
    Route::post('/location_city/update/{id}', 'LocationCityController@update');
    Route::post('/location_city/destroy/{id}', 'LocationCityController@destroy');

    // 分店管理
    Route::get('/location', 'LocationController@index');
    Route::get('/location/create', 'LocationController@create');
    Route::post('/location/store', 'LocationController@store');
    Route::get('/location/edit/{id}', 'LocationController@edit');
    Route::post('/location/update/{id}', 'LocationController@update');
    Route::post('/location/destroy/{id}', 'LocationController@destroy');

    // 最新消息類型管理
    Route::get('/news_type', 'NewsTypeController@index');
    Route::get('/news_type/create', 'NewsTypeController@create');
    Route::post('/news_type/store', 'NewsTypeController@store');
    Route::get('/news_type/edit/{id}', 'NewsTypeController@edit');
    Route::post('/news_type/update/{id}', 'NewsTypeController@update');
    Route::post('/news_type/destroy/{id}', 'NewsTypeController@destroy');

    // 徵才條件管理
    Route::get('/recruit_content', 'RecruitContentController@index');
    Route::get('/recruit_content/edit', 'RecruitContentController@edit');
    Route::post('/recruit_content/update', 'RecruitContentController@update');

    // 徵才店家管理
    Route::get('/recruit_job', 'RecruitJobController@index');
    Route::get('/recruit_job/create', 'RecruitJobController@create');
    Route::post('/recruit_job/store', 'RecruitJobController@store');
    Route::get('/recruit_job/edit/{id}', 'RecruitJobController@edit');
    Route::post('/recruit_job/update/{id}', 'RecruitJobController@update');
    Route::post('/recruit_job/destroy/{id}', 'RecruitJobController@destroy');

    // 徵才店家的城市、分店選擇（第二層下拉式選單）
    Route::get('/getShops/{id}','RecruitJobController@getShops');

    //帳號管理
    Route::get('/account', 'AccountController@index');
    Route::get('/account/create', 'AccountController@create');
    Route::post('/account/store', 'AccountController@store');
    Route::get('/account/edit/{id}', 'AccountController@edit');
    Route::post('/account/update/{id}', 'AccountController@update');
    Route::post('/account/destroy/{id}', 'AccountController@destroy');

    Route::get('/account/select/{role}','AccountController@select');
});


