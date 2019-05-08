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

Route::get('/learn', 'PlantBaseController@indextwo')->name('plant-bible');
Route::get('/learn/action', 'PlantBaseController@action')->name('live_search.action');

Route::get('/learn/{plant}', 'PlantBaseController@show')->name('plant.show');
Route::get('/single/{plant}/', 'PlantBaseController@single')->name('single.show');

Route::get('/shop', 'PlantBaseController@shop')->name('plant.store');

Route::get('/recipes', 'RecipesController@frontindex')->name('recipe.book');
Route::get('/recipes/{plant}/', 'RecipesController@frontshow')->name('plant.recipes');
Route::get('/recipe/{recipe}/', 'RecipesController@single')->name('single.recipe');
Route::get('/print/{recipe}/','RecipesController@printPDF')->name('print.recipe');


Route::get('/live_search', 'PlantBaseController@indextwo');
Route::get('/live_search/action', 'PlantBaseController@action')->name('live_search.action');


Route::get('/contact', 'ContactController@index')->name('contact.us');
Route::post('/contact', 'ContactController@mailToAdmin');


Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{singleblog}', 'BlogController@single')->name('single.blog');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');

Route::post('/cart/{plant}', 'CartController@destroy')->name('cart.destroy');
Route::get('empty', function(){
    Cart::destroy();
});

Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/thankyou', function () {
    return view('thankyou');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/administrator', function () {
    return view('admin.dashboard');
});
*/
Route::group(['prefix' => 'admin', 'middleware'=> 'auth'], function () {
    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('plant', 'PlantBaseController');
    Route::resource('recipe', 'RecipesController');
    Route::resource('category', 'CategoryController');


    Route::post("addingredient","RecipesController@addIngredientPost");
    
});