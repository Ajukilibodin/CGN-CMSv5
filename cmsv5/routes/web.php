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

Route::get('/', 'VisitorNav@index');
Route::get('/login', 'VisitorNav@login');
Route::post('/login/login', 'VisitorNav@f_login');
Route::post('/login/register', 'VisitorNav@f_register');
Route::get('/cart', 'VisitorNav@cart');
Route::get('/checkout', 'VisitorNav@checkout');

Route::get('/ajan', 'AdminAuth@mainload');
Route::post('/ajan/loginsubmit', 'AdminAuth@submit');
Route::get('/ajan/logout', 'AdminAuth@logout');

Route::get('/ajan/sitesettings', 'SiteEdit@mainload');
