<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {    
    //Route::get('/', 'MainController@index');
    Route::get('/', ['as' => 'home', 'uses' => 'MainController@index']);
    Route::get('/cart', 'MainController@cart');
    Route::get('/testimoni', 'MainController@testimoni');
    Route::get('/tentang_kami', 'MainController@kami');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/admin/home', 'HomeController@index');
    Route::resource('/admin/testimoni', 'TestimoniController');
    Route::resource('/admin/download', 'DownloadController');
    Route::get('/admin/kami', 'KamiController@index');
    Route::post('/admin/kami', 'KamiController@create');
    Route::resource('/admin/brand', 'BrandController');
    Route::resource('/admin/categori', 'CategoriController');
    Route::resource('/admin/product', 'ProductController');
    Route::resource('/admin/banner', 'BannerController');
    Route::get('/admin/transaksi', 'TransaksiController@index');
    Route::get('/admin/konfirmasi', 'KonfirmasiController@index');
});
