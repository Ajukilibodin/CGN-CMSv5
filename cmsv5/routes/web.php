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
Route::get('/profile', 'VisitorNav@profile');
Route::post('/profile/update', 'VisitorNav@profile_update');
Route::get('/page', 'VisitorNav@page');
Route::get('/cart', 'VisitorNav@cart');
Route::get('/checkout', 'VisitorNav@checkout');
Route::get('/category', 'VisitorNav@category');
Route::get('/products', 'VisitorNav@products');
Route::get('/product', 'VisitorNav@product');
Route::get('/orderdetail', 'VisitorNav@orderdetail');

Route::get('/ajan', 'AdminAuth@mainload');
Route::post('/ajan/loginsubmit', 'AdminAuth@submit');
Route::get('/ajan/logout', 'AdminAuth@logout');
Route::get('/ajan/sitesettings', 'AdminSiteEdit@mainload');
Route::get('/ajan/customers', 'AdminCustomerEdit@mainload');
