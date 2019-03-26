<?php

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

Route::get('/', 'WelcomeController@index')->name('welcome-page');

Route::get('/learn', 'PlantBaseController@index')->name('plant-bible');
Route::get('/learn/{plant}', 'PlantBaseController@show')->name('plant.show');

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/plant', function () {
    return view('plant');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/thankyou', function () {
    return view('thankyou');
});
