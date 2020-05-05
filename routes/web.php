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

//Route::get('/', 'FrontendController@index')->name('frontend.index');
//Route::get('/about', 'FrontendController@about')->name('frontend.about');
//Route::get('/blog', 'FrontendController@blog')->name('frontend.blog');
//Route::get('/single-blog', 'FrontendController@singleBlog')->name('frontend.single-blog');
//Route::get('/cart', 'FrontendController@cart')->name('frontend.cart');
//Route::get('/checkout', 'FrontendController@checkout')->name('frontend.checkout');
//Route::get('/contact', 'FrontendController@contact')->name('frontend.contact');
//Route::get('/product-single', 'FrontendController@singleProduct')->name('frontend.single-product');
//Route::get('/shop', 'FrontendController@shop')->name('frontend.shop');
//Route::get('/wishlist', 'FrontendController@wishlist')->name('frontend.wishlist');

//Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
    Auth::routes();


Route::group(['middleware' => 'auth', 'prefix' => 'superadmin'], function () {
    Route::resource('tables', 'TableController');
    Route::resource('sections', 'SectionController');
    Route::resource('unit-measurement', 'UnitMeasurementController');
    Route::resource('indicators', 'IndicatorController');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('data/index', 'DataController@index')->name('data.index');
    Route::get('data/create/{type}', 'DataController@create')->name('data.create');
    Route::post('data/submit/{type}', 'DataController@store')->name('data.submit');
    Route::get('data/{data}/{type}/edit', 'DataController@edit')->name('data.edit');
    Route::put('data/{data}/{type}/update', 'DataController@update')->name('data.update');

    Route::get('get-data', 'GetDataController@index')->name('get-data.index');
    Route::get('get-table-data/{table}', 'GetDataController@getTableData')->name('get-data.table');
    Route::get('get-table-data-regional/{region}/{table}', 'GetDataController@getTableDataRegional')->name('get-data-regional.index');
    Route::get('get-table-data-result/{district}/{table}', 'GetDataController@getTableDataResult')->name('get-data-result.index');
    Route::get('change-districts', 'DataController@changeDistricts')->name('change-districts');

    Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

