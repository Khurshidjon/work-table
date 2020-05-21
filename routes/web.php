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


Route::group(['middleware' => ['auth', 'role:superadmin'], 'prefix' => 'superadmin'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::resource('tables', 'TableController');
    Route::resource('sections', 'SectionController');
    Route::resource('unit-measurement', 'UnitMeasurementController');
    Route::resource('indicators', 'IndicatorController');
    Route::get('register', 'HomeController@register')->name('register');
    Route::post('register/user', 'Auth\RegisterController@register')->name('register.form');
});
Route::group(['middleware' => ['auth', 'permission:ko\'rish huquqi']], function () {

    Route::group(['middleware' => 'permission:yaratish huquqi'], function (){
        Route::get('data/index', 'DataController@index')->name('data.index');
        Route::get('data/index-list/{table}', 'DataController@dataList')->name('data.list');
        Route::get('data/create/{table}', 'DataController@create')->name('data.create');
        Route::post('data/submit/{table}', 'DataController@store')->name('data.submit');
        Route::post('data/{dataCollection}/{table}/confirm', 'DataController@confirm')->name('data.confirm');
        Route::get('data/{dataCollection}/{table}/edit', 'DataController@edit')->name('data.edit');
        Route::get('data/{dataCollection}/{table}/show', 'DataController@show')->name('data.show');
        Route::put('data/{dataCollection}/{table}/update', 'DataController@update')->name('data.update');

        Route::get('data/create-poor-population/{table?}', 'DataPoorPopulationController@create')->name('data.poor-population');
        Route::post('data-poor-population/{table}/submit', 'DataPoorPopulationController@store')->name('data-poor-population.submit');
        Route::post('data-poor-population/{dataPoorPopulation}/{table}/confirm', 'DataPoorPopulationController@confirm')->name('data-poor-population.confirm');
        Route::get('data-poor-population/{dataPoorPopulation}/{table}/edit', 'DataPoorPopulationController@edit')->name('data-poor-population.edit');
        Route::get('data-poor-population/{dataPoorPopulation}/{table}/show', 'DataPoorPopulationController@show')->name('data-poor-population.show');
        Route::put('data-poor-population/{dataPoorPopulation}/{table}/update', 'DataPoorPopulationController@update')->name('data-poor-population.update');
    });

    Route::get('get-data', 'GetDataController@index')->name('get-data.index');
    Route::get('get-table-data/{table}', 'GetDataController@getTableData')->name('get-data.table');
    Route::get('get-table-data-regional/{region}/{table}', 'GetDataController@getTableDataRegional')->name('get-data-regional.index');
    Route::get('get-table-data-result/{district}/{table}', 'GetDataController@getTableDataResult')->name('get-data-result.index');
    Route::get('change-districts', 'DataController@changeDistricts')->name('change-districts');
    Route::get('change-quarter', 'DataController@changeQuarter')->name('change-quarter');

    Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

});

