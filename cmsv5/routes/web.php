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

Route::post('/test', function (Request $request) { return $request; });

Route::get('/', 'VisitorNav@index')->name('index');
Route::post('/subscribe', 'VisitorNav@subscribe');

Route::get('/login', 'VisitorNav@login');
Route::get('/logout', 'VisitorNav@logout');
Route::post('/login/login', 'VisitorNav@f_login');
Route::post('/login/register', 'VisitorNav@f_register');
Route::get('/login/loginkey/{key}', 'VisitorNav@loginkey');

Route::get('/profile', 'VisitorNav@profile');
Route::post('/profile/update', 'VisitorNav@profile_update');
Route::post('/profile/updateaddress', 'VisitorNav@updateaddress');
Route::post('/profile/changepassword', 'VisitorNav@changepassword');

Route::get('/page/{p_id}', 'VisitorNav@page');
Route::get('/contact', 'VisitorNav@contact');

Route::get('/category', 'VisitorNav@category');
Route::get('/products', 'VisitorNav@red_category');//products_all
Route::get('/products/{c_id}', 'VisitorNav@productsshow');
Route::get('/product', 'VisitorNav@red_category');
Route::get('/product/{p_id}', 'VisitorNav@product');
Route::get('/product_pre/{p_id}', 'VisitorNav@product_pre');

Route::post('/product-setlist', 'ListActions@load');
Route::post('/get-product-modal', 'ListActions@getmodal');

Route::get('/cart', 'VisitorNav@cart');
Route::post('/addcart/{p_id}', 'ShopAction@addcart');
Route::get('/delcart/{p_id}', 'ShopAction@delcart');
Route::get('/clearcart', 'ShopAction@clearcart');
Route::post('/updatecart', 'ShopAction@updatecart');

Route::get('/checkoutback','ShopAction@checkoutback');
Route::post('/checkout', 'ShopAction@checkout');
Route::get('/checkout', 'ShopAction@checkout');

Route::post('/orderdetail', 'ShopAction@orderdetail');

/*********************************************************/

Route::get('/ajan', 'AdminAuth@mainload');
Route::get('/ajan/nonpage', 'AdminAuth@nonpage');
Route::post('/ajan/loginsubmit', 'AdminAuth@submit');
Route::get('/ajan/logout', 'AdminAuth@logout');

Route::get('/ajan/sitesettings', 'Admin\SiteEdit@mainload');
Route::post('/ajan/sitesettings', 'Admin\SiteEdit@savesettings');

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
Route::get('/ajan/categories/{c_id}', 'Admin\ProductModule@subcateload');
Route::get('/ajan/delcategory/{c_id}', 'Admin\ProductModule@delcategory');
Route::get('/ajan/delsubcategory/{p_id}/{c_id}', 'Admin\ProductModule@delcategory');
Route::get('/ajan/addcategory/{c_id}', 'Admin\ProductModule@addcategory');
Route::post('/ajan/addcategory/{c_id}', 'Admin\ProductModule@addcategorypost');
Route::get('/ajan/editcategory/{c_id}', 'Admin\ProductModule@editcategory');
Route::post('/ajan/editcategory/{c_id}', 'Admin\ProductModule@editcategorypost');

Route::get('/ajan/prodcate', 'Admin\ProductModule@prodcateload');
Route::get('/ajan/addprodcate', 'Admin\ProductModule@addprodcateload');
Route::post('/ajan/addprodcate', 'Admin\ProductModule@addprodcatepost');
Route::get('/ajan/editprodcate/{c_id}', 'Admin\ProductModule@editprodcateload');
Route::post('/ajan/editprodcate/{c_id}', 'Admin\ProductModule@editprodcatepost');
Route::get('/ajan/delprodcate/{c_id}', 'Admin\ProductModule@delprodcate');

Route::get('/ajan/exchanges', 'Admin\ProductModule@exchangesload');
Route::post('/ajan/exchanges/{e_id}', 'Admin\ProductModule@exchangespost');

Route::get('/ajan/editstock/{p_id}', 'Admin\ProductModule@editstockload');
Route::post('/ajan/editstock/{action}/{p_id}', 'Admin\ProductModule@editstockpost');

Route::get('/ajan/products', 'Admin\ProductModule@productsload');
Route::get('/ajan/products/{c_id}', 'Admin\ProductModule@productlist');
Route::get('/ajan/addproduct', 'Admin\ProductModule@addproductload');
Route::post('/ajan/addproduct', 'Admin\ProductModule@addproductpost');
Route::get('/ajan/delproduct/{c_id}/{p_id}', 'Admin\ProductModule@delproduct');
Route::get('/ajan/modproduct/{p_id}', 'Admin\ProductModule@editproductload');
Route::post('/ajan/modproduct/{p_id}', 'Admin\ProductModule@editproductpost');

Route::get('/ajan/productalbum/{p_id}', 'Admin\ProductModule@productalbumload');
Route::post('/ajan/productalbum/{p_id}', 'Admin\ProductModule@productalbumadd');
Route::get('/ajan/productalbum/del/{p_id}/{i_name}', 'Admin\ProductModule@productalbumdel');

Route::get('/ajan/faststock', 'Admin\FastStockManage@load');
Route::post('/ajan/faststock', 'Admin\FastStockManage@load2');

Route::get('/ajan/orders', 'Admin\OrderManage@listorder');
Route::get('/ajan/orders/current', 'Admin\OrderManage@listcurrent');
Route::get('/ajan/orders/done', 'Admin\OrderManage@listold');
Route::get('/ajan/orders/{o_id}', 'Admin\OrderManage@editorder');
Route::post('/ajan/orders/{o_id}', 'Admin\OrderManage@editorderpost');
Route::get('/ajan/orders/delorder/{o_id}', 'Admin\OrderManage@delorder');
