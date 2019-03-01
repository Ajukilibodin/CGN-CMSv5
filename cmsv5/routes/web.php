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
    return view('pages/index');
});

Route::get('/ajan', function () {
  if(Cookie::get('ajanlogin')) return view('admin/index');
  else return view('admin/login');
});

Route::post('/ajan/loginsubmit', 'AdminAuth@submit');
Route::get('/ajan/logout', 'AdminAuth@logout');

Route::get('/ajan/sitesettings', 'SiteEdit@mainload');
