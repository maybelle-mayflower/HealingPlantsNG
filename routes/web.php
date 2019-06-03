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
Route::post('/log_out', 'WelcomeController@logOut')->name('log_out');

Route::get('/learn', 'PlantBaseController@indextwo')->name('plant-bible');
Route::get('/learn/action', 'PlantBaseController@action')->name('live_search.action');

Route::get('/learn/{plant}', 'PlantBaseController@show')->name('plant.show');
Route::get('/single/{plant}/', 'PlantBaseController@single')->name('single.show');
Route::any('/search', 'PlantBaseController@search')->name('plant.search');

Route::get('/shop', 'ProductController@shop')->name('plant.shop');

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

//Route::get('/cart', 'CartController@index')->name('cart.index');

Route::resource('/cart', 'CartController')->middleware(['auth']);
Route::get('/cart/add/{id}', 'CartController@save')->name('cart.save');

Route::get('/checkout', 'CartController@checkout')->middleware(['auth'])->name('cart.checkout');


Route::resource('/orders', 'OrdersController')->middleware(['auth']);
Route::post('/pay', 'OrdersController@redirectToGateway')->middleware(['auth'])->name('pay'); 

Route::get('/payment/callback', 'OrdersController@handleGatewayCallback');

//Route::post('/cart/{plant}', 'CartController@destroy')->name('cart.destroy');
Route::get('empty', function(){
    Cart::destroy();
    return back();
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
    Route::resource('product', 'ProductController');

    Route::get('/plant/delete/{id}', 'PlantBaseController@delete')->name('plant.del');
    Route::get('/plant/activate/{id}', 'PlantBaseController@activate')->name('plant.activate');

    Route::get('ingredient/edit/', 'ingredientController@fetchdata')->name('fetch.ingredient');
    Route::get('ingredient/update/', 'ingredientController@updateData')->name('update.ingredient');
    Route::get('recipe/ingredientstable/{id}', 'RecipesController@fetchIng')->name('load.table');
    Route::get('ingredient/delete/', 'ingredientController@destroyData')->name('destroy.ingredient');


    //Route::post("addingredient","RecipesController@addIngredientPost");
    
});