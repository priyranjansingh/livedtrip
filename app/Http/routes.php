<?php



/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

|

| Here is where you can register all of the routes for an application.

| It's a breeze. Simply tell Laravel the URIs it should respond to

| and give it the controller to call when that URI is requested.

|

*/

/*frontend*/

Route::get('/', 'Auth\AuthController@getLogin');


Route::get('user/login', 'Front\LoginController@index');
Route::get('user/logout', 'Front\UserController@logout');
Route::get('user/signup', 'Front\SignupController@index');
Route::get('user/myaccount', 'Front\UserController@index');
//Route::get('user/myaccount',array('as' => 'myaccount','middleware'=>'frontauth','uses' => 'Front\UserController@index'));
Route::post('signup', 'Front\SignupController@registration');
Route::post('login', 'Front\LoginController@login');


Route::get('user/facebook', 'Front\UserController@redirectToProvider');
Route::get('user/facebook/callback', 'Front\UserController@handleProviderCallback');
Route::get('user/google', 'Front\UserController@redirectToGoogleProvider');
Route::get('user/google/callback', 'Front\UserController@handleProviderGoogleCallback');


Route::get('home', 'Front\HomeController@index');
Route::post('search', 'Front\HomeController@searchResult');
Route::get('search/{going_to}', 'Front\HomeController@searchView');
Route::post('searchCriteria', 'Front\HomeController@searchCriteria');
Route::any('auto','Front\HomeController@getCity');

Route::get('details/{pname}/{pid}', 'Front\FrontPackagedetailsController@index');
/*frontend*/

/*admin end*/
Route::get('country', 'CountriesController@index');

Route::get('country/create', 'CountriesController@create');

Route::get('country/{id}', 'CountriesController@show');

Route::post('country','CountriesController@store');

Route::delete('country/{id}',array('as' => 'country', 'uses' => 'CountriesController@destroy'));

Route::get('country/{id}/edit','CountriesController@edit');

Route::patch('country/{id}/update','CountriesController@update');



Route::get('state', 'StatesController@index');

Route::get('state/create', 'StatesController@create');

Route::get('state/{id}', 'StatesController@show');

Route::post('state','StatesController@store');

Route::delete('state/{id}',array('as' => 'state', 'uses' => 'StatesController@destroy'));

Route::get('state/{id}/edit','StatesController@edit');

Route::patch('state/{id}/update','StatesController@update');





Route::get('city', 'CitiesController@index');

Route::get('city/create', 'CitiesController@create');

Route::get('city/{id}', 'CitiesController@show');

Route::get('getState/{id}', 'CitiesController@getState');

Route::post('city','CitiesController@store');

Route::delete('city/{id}',array('as' => 'city', 'uses' => 'CitiesController@destroy'));

Route::get('city/{id}/edit','CitiesController@edit');

Route::patch('city/{id}/update','CitiesController@update');







Route::get('hotel', 'HotelsController@index');

Route::get('hotel/create', 'HotelsController@create');

Route::get('hotel/{id}', 'HotelsController@show');

Route::get('getHotelState/{id}', 'HotelsController@getState');

Route::get('getHotelCity/{id}', 'HotelsController@getCity');

Route::get('getHotelLocation/{id}', 'HotelsController@getLocation');

Route::get('getHotelName/{id}', 'HotelsController@getHotel');

Route::post('hotel','HotelsController@store');

Route::delete('hotel/{id}',array('as' => 'hotel', 'uses' => 'HotelsController@destroy'));

Route::get('hotel/{id}/edit','HotelsController@edit');

Route::patch('hotel/{id}/update','HotelsController@update');

Route::get('changeStatus/{id}', 'HotelsController@changeStat');



Route::get('hotelgallery/create/{id}', 'HotelgalleryController@create');

Route::post('hotelgallery','HotelgalleryController@store');

Route::get('hotelgallery/{id}/edit','HotelgalleryController@edit');

Route::get('removeGallery/{id}', 'HotelgalleryController@destroy');


Route::get('packageChangeStatus/{id}', 'PackagesController@changeStat');

Route::get('package', 'PackagesController@index');

Route::get('package/create', 'PackagesController@create');

Route::post('package','PackagesController@store');

Route::delete('package/{id}',array('as' => 'package', 'uses' => 'PackagesController@destroy'));

Route::get('package/{id}/edit','PackagesController@edit');

Route::patch('package/{id}/update','PackagesController@update');



Route::get('packagedetail/{id}', 'PackagedetailController@index');

Route::get('packagedetail/create/{id}', 'PackagedetailController@create');

Route::post('packagedetail','PackagedetailController@store');

Route::get('packagedetail/{id}/edit','PackagedetailController@edit');

Route::patch('packagedetail/{id}/update','PackagedetailController@update');

Route::delete('packagedetail/{id}',array('as' => 'packagedetail', 'uses' => 'PackagedetailController@destroy'));

Route::get('packagedetail/{id}/show','PackagedetailController@show');











Route::get('packagegallery/create/{id}', 'PackagegalleryController@create');

Route::post('packagegallery','PackagegalleryController@store');

Route::get('packagegallery/{id}/edit','PackagegalleryController@edit');

Route::get('removepackageGallery/{id}', 'PackagegalleryController@destroy');







Route::get('location', 'LocationsController@index');

Route::get('location/create', 'LocationsController@create');

Route::get('location/{id}', 'LocationsController@show');

Route::get('getState/{id}', 'LocationsController@getState');

Route::get('getCity/{id}', 'LocationsController@getCity');

Route::post('location','LocationsController@store');

Route::delete('location/{id}',array('as' => 'location', 'uses' => 'LocationsController@destroy'));

Route::get('location/{id}/edit','LocationsController@edit');

Route::patch('location/{id}/update','LocationsController@update');

Route::get('locationChangeStatus/{id}', 'LocationsController@changeStat');





Route::get('tour-class', 'TourClassesController@index');

Route::get('tour-class/create', 'TourClassesController@create');

Route::get('tour-class/{id}', 'TourClassesController@show');

Route::post('tour-class','TourClassesController@store');

Route::delete('tour-class/{id}',array('as' => 'tour-class', 'uses' => 'TourClassesController@destroy'));

Route::get('tour-class/{id}/edit','TourClassesController@edit');

Route::patch('tour-class/{id}/update','TourClassesController@update');



Route::get('tour-theme', 'TourThemesController@index');

Route::get('tour-theme/create', 'TourThemesController@create');

Route::get('tour-theme/{id}', 'TourThemesController@show');

Route::post('tour-theme','TourThemesController@store');

Route::delete('tour-theme/{id}',array('as' => 'tour-theme', 'uses' => 'TourThemesController@destroy'));

Route::get('tour-theme/{id}/edit','TourThemesController@edit');

Route::patch('tour-theme/{id}/update','TourThemesController@update');



Route::get('tour-category', 'TourCategoriesController@index');

Route::get('tour-category/create', 'TourCategoriesController@create');

Route::get('tour-category/{id}', 'TourCategoriesController@show');

Route::post('tour-category','TourCategoriesController@store');

Route::delete('tour-category/{id}',array('as' => 'tour-category', 'uses' => 'TourCategoriesController@destroy'));

Route::get('tour-category/{id}/edit','TourCategoriesController@edit');

Route::patch('tour-category/{id}/update','TourCategoriesController@update');

Route::get('tourcatagoryChangeStatus/{id}', 'TourCategoriesController@changeStat');



Route::get('content', 'ContentsController@index');

Route::get('content/{id}/edit','ContentsController@edit');

Route::patch('content/{id}/update','ContentsController@update');

Route::get('customer', 'CustomersController@index');
Route::get('customer/{id}/edit','CustomersController@edit');
Route::patch('customer/{id}/update','CustomersController@update');
Route::get('customer/create', 'CustomersController@create');
Route::post('customer','CustomersController@store');
Route::delete('customer/{id}',array('as' => 'customer', 'uses' => 'CustomersController@destroy'));

/*admin end*/
//Route::get('login', 'FrontloginController@index');
//Route::get('signup', 'FrontloginController@signup');

//Route::post('login', 'FrontloginController@registration');



Route::controllers([

	'auth' => 'Auth\AuthController',

	'password' => 'Auth\PasswordController',

]);

