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

Route::get('/', function () {
	// return redirect(config('backpack.base.route_prefix', 'admin'));
	return redirect("user/login");
    // return view('login');
});

// Auth::routes();

// Route::get("users/dashboard","Users\userController@index");


Route::get ("user", "User\DonarController@redirect");
Route::get ("user/home", "User\DonarController@index");
Route::get ("user/dashboard", "User\DonarController@dashboard");
Route::get ("user/login", "User\LoginController@showLoginForm");
Route::post("user/login", "User\LoginController@login");
Route::post("user/logout", "User\LoginController@logout");
Route::get ("user/logout", "User\LoginController@logout");
Route::post("user/password/email", "User\ForgotPasswordController@sendResetLinkEmail");
Route::post("user/password/reset", "User\ResetPasswordController@reset");
Route::get ("user/password/reset", "User\ForgotPasswordController@showLinkRequestForm");
Route::get ("user/password/reset/{token}", "User\ResetPasswordController@showResetForm");
Route::get ("user/register", "User\RegisterController@showRegistrationForm");
Route::post("user/register", "User\RegisterController@register");
Route::get ('user/commisions', 'User\DonarController@commisions');
Route::get ('user/campaigns', 'User\DonarController@campaigns');
Route::get ('user/charities', 'User\DonarController@charities');

Route::get("charity", "Charity\CharityController@redirect");
Route::get("charity/dashboard", "Charity\CharityController@dashboard");
Route::get("charity/login", "Charity\LoginController@showLoginForm");
Route::post("charity/login", "Charity\LoginController@login");
Route::post("charity/logout", "Charity\LoginController@logout");
Route::get("charity/logout", "Charity\LoginController@logout");
Route::post("charity/password/email", "Charity\ForgotPasswordController@sendResetLinkEmail");
Route::post("charity/password/reset", "Charity\ResetPasswordController@reset");
Route::get("charity/password/reset", "Charity\ForgotPasswordController@showLinkRequestForm");
Route::get("charity/password/reset/{token}", "Charity\ResetPasswordController@showResetForm");
Route::get("charity/register", "Charity\RegisterController@showRegistrationForm");
Route::post("charity/register", "Charity\RegisterController@register");
Route::get("charity/campaigns", "Charity\CharityController@campaigns");
Route::get("charity/affiliates", "Charity\CharityController@affiliates");
Route::get("charity/commisions", "Charity\CharityController@commisions");






Route::get ('admin/earnings/campaigns/', 'Earning@campaigns');
Route::get ('admin/earnings/campaigns/details/{id}', 'Earning@campaigns_details');
Route::get ('admin/earnings/affiliates/', 'Earning@affiliates');
Route::get ('admin/earnings/affiliates/details/{id}', 'Earning@affiliates_details');
Route::get ('admin/earnings/users/', 'Earning@users');
Route::get ('admin/earnings/users/details/{id}', 'Earning@users_details');
Route::get ('admin/earnings/charities/', 'Earning@charities');
Route::get ('admin/earnings/charities/details/{id}', 'Earning@charity_details');
Route::get ('admin/earnings/charities/{id}/groupby/{group}', 'Earning@charity_group');


Route::get ('click/{token}', 'Click@redirect');
Route::get('admin/data/import', function () {
	CJ::ImportData();
	return redirect("admin");
    // return view('login');
});

Route::get ('admin/campaign', 'Campaign@index');
Route::get ('admin/campaign/add', 'Campaign@add');
Route::post('admin/campaign/add', 'Campaign@store');
Route::get ('admin/campaign/{id}', 'Campaign@edit');
Route::post('admin/campaign/{id}', 'Campaign@update');
Route::post('admin/campaign/delete/{id}', 'Campaign@delete');

Route::get('admin/category','Category@index');
Route::get('admin/category/add','Category@add');
Route::post('admin/category/add','Category@store');
Route::get('admin/category/{id}','Category@edit');
Route::patch('admin/category/{id}','Category@update');

Route::get ('admin/charity', 'Charity@index');
Route::get ('admin/charity/pending', 'Charity@pending');
Route::post('admin/charity/pending/update', 'Charity@pending_update');
Route::get ('admin/charity/add', 'Charity@add');
Route::post('admin/charity/add', 'Charity@store');
Route::get ('admin/charity/groups', 'Charity@groups');
Route::get ('admin/charity/groups/add', 'Charity@groups_add');
Route::post('admin/charity/groups/add', 'Charity@groups_add_process');
Route::get ('admin/charity/groups/{id}', 'Charity@groups_edit');
Route::post('admin/charity/groups/{id}', 'Charity@groups_update');
Route::get ('admin/charity/{id}', 'Charity@edit');
Route::post('admin/charity/{id}', 'Charity@update');
Route::post('admin/charity/delete/{id}', 'Charity@delete');

Route::get ('admin/affiliate', 'Affiliate@index');
Route::get ('admin/affiliate/add', 'Affiliate@add');
Route::post('admin/affiliate/add', 'Affiliate@store');
Route::get ('admin/affiliate/commisions/{id}', 'Affiliate@commisions');
Route::get ('admin/affiliate/{id}', 'Affiliate@edit');
Route::post('admin/affiliate/{id}', 'Affiliate@update');
Route::post('admin/affiliate/delete/{id}', 'Affiliate@delete');
Route::get ('admin/products', 'ProductController@index');
Route::get ('admin/products/add', 'ProductController@add');
Route::post('admin/products/add', 'ProductController@store');
Route::get ('admin/products/{id}', 'ProductController@edit');
Route::post('admin/products/{id}', 'ProductController@update');
Route::post('admin/products/delete/{id}', 'ProductController@delete');


Route::get ('admin/users', 'DonarController@index');
Route::get ('admin/users/add', 'DonarController@add');
Route::post('admin/users/add', 'DonarController@store');
Route::get ('admin/users/pending', 'DonarController@pending');
Route::post('admin/users/pending/update', 'DonarController@pending_update');
Route::get ('admin/users/{donar}', 'DonarController@edit');
Route::post('admin/users/{donar}', 'DonarController@update');

// search route 
Route::get('/search','SearchController@index');
// search route

Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('/home', 'User\DonarController@dashboard');
