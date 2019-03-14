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

Route::get('/', 'VisitorNav@index')->name('index');

Route::get('/login', 'VisitorNav@login');
Route::get('/logout', 'VisitorNav@logout');
Route::post('/login/login', 'VisitorNav@f_login');
Route::post('/login/register', 'VisitorNav@f_register');
Route::get('/login/loginkey/{key}', 'VisitorNav@loginkey');

Route::get('/profile', 'VisitorNav@profile');
Route::post('/profile/update', 'VisitorNav@profile_update');

Route::get('/page/{p_id}', 'VisitorNav@page');

Route::get('/cart', 'VisitorNav@cart');
Route::get('/checkout', 'VisitorNav@checkout');
Route::get('/category', 'VisitorNav@category');
Route::get('/products', 'VisitorNav@products');
Route::get('/product', 'VisitorNav@product');
Route::get('/orderdetail', 'VisitorNav@orderdetail');

/*********************************************************/

Route::get('/ajan', 'AdminAuth@mainload');
Route::post('/ajan/loginsubmit', 'AdminAuth@submit');
Route::get('/ajan/logout', 'AdminAuth@logout');

Route::get('/ajan/sitesettings', 'Admin\SiteEdit@mainload');
Route::post('/ajan/sitesettings/update/{w_id}', 'Admin\SiteEdit@saveSetting');

Route::get('/ajan/customers', 'Admin\CustomerEdit@mainload');
Route::get('/ajan/customers/delete/{w_id}', 'Admin\CustomerEdit@deleteCustomer');

Route::get('/ajan/menupage', 'Admin\MenuPage@mainload');
Route::get('/ajan/menupage/{p_id}', 'Admin\MenuPage@pagesload');
Route::get('/ajan/addmenu', 'Admin\MenuPage@addmenuload');
Route::post('/ajan/addmenu', 'Admin\MenuPage@addmenupost');
Route::get('/ajan/delmenu/{w_id}', 'Admin\MenuPage@delmenu');
Route::get('/ajan/addpage/{p_id}', 'Admin\MenuPage@addpageload');
Route::post('/ajan/addpage/{p_id}', 'Admin\MenuPage@addpagepost');
Route::get('/ajan/delpage/{w_id}/{p_id}', 'Admin\MenuPage@delpage');
Route::get('/ajan/modmenu/{w_id}', 'Admin\MenuPage@modmenuload');
Route::post('/ajan/modmenu/{w_id}', 'Admin\MenuPage@modmenupost');
Route::get('/ajan/modpage/{p_id}', 'Admin\MenuPage@modpageload');
Route::post('/ajan/modpage/{w_id}/{p_id}', 'Admin\MenuPage@modpagepost');

Route::get('/ajan/slidersettings', 'Admin\Slider@mainload');
Route::get('/ajan/delslider/{s_id}', 'Admin\Slider@delslider');
Route::get('/ajan/addslider', 'Admin\Slider@addload');
Route::post('/ajan/addslider', 'Admin\Slider@addpost');

Route::get('/ajan/categories', 'Admin\ProductModule@categoryload');
