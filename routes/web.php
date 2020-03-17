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
    return view('welcome');
});
Route::get('Login', 'Admin\LoginController@getLogin');
Route::post('postLogin','Admin\LoginController@postLogin');
Route::get('Logout', 'Admin\LoginController@getLogout');

Route::group(['prefix'=>'Admin','middleware'=>'checkLogin'], function(){

	Route::get('information', 'Admin\LoginController@getinformation');
	Route::get('editAdmin', 'Admin\LoginController@getEditAdmin');
	Route::post('edit/{id}','Admin\LoginController@getEdit');

	Route::get('','Admin\HomeController@getIndex');
	
	Route::group(['prefix'=>'Category'], function(){
		Route::get('', 'Admin\CategoryController@getCategory');
		Route::get('editCategory/{id}', 'Admin\CategoryController@getEditCategory');
		Route::post('postCategory', 'Admin\CategoryController@postCategory');
		Route::post('postEditCategory/{id}', 'Admin\CategoryController@postEditCategory');
		Route::get('delCategory/{id}', 'Admin\CategoryController@delCategory');
		
	});

	Route::group(['prefix'=>'Product'], function(){
		Route::get('addProduct', 'Admin\ProductController@getAddProduct');
		Route::post('postProduct', 'Admin\ProductController@postProduct');
		Route::post('postEditProduct/{id}', 'Admin\ProductController@postEditProduct');
		Route::get('editProduct/{id}', 'Admin\ProductController@getEditProduct');
		Route::get('listProduct','Admin\ProductController@getListProduct');
		Route::get('delProduct/{id}','Admin\ProductController@delProduct');
	});
	Route::group(['prefix'=>'User'], function(){
		Route::get('addUser', 'Admin\UserController@getAddUser');
		Route::get('editUser/{id}', 'Admin\UserController@getEditUser');
		Route::get('listUser','Admin\UserController@getListUser');
		Route::get('delUser/{idd}','Admin\UserController@getdelUser');
		Route::post('postAddUser', 'Admin\UserController@postAddUser');
		Route::post('postEditUser/{id}', 'Admin\UserController@postEditUser');
	});
	Route::group(['prefix'=>'Order'], function(){
		Route::get('detailOrder/{id}', 'Admin\OrderController@getDetailOrder');
		Route::get('processed/{id}', 'Admin\OrderController@getProcessed');
		Route::get('','Admin\OrderController@getOrder');
		Route::get('process','Admin\OrderController@getProcess');
	});

});



Route::group(['prefix'=>'Frontend'], function(){
	Route::post('contact','FrontendController@postContact');

	Route::get('/', 'FrontendController@getIndex');
	Route::get('shop', 'FrontendController@getShop');
	Route::get('{slug_Cate}.html','FrontendController@getPrdCate');
	Route::get('filter', 'FrontendController@getFilter');
	Route::group(['prefix'=>'Product'], function(){
		Route::get('{slug_Prd}.html', 'FrontendController@getdetail');
		Route::get('about','FrontendController@getAbout');
		Route::get('contact','FrontendController@getContact');
		//CART
		Route::post('AddCart/{id}', 'FrontendController@postAddCart');
		
		Route::get('show','FrontendController@getShowCart');
		Route::get('delCart/{rowId}','FrontendController@getDelCart');
		Route::get('update/{rowId}/{qty}','FrontendController@getUpdate')->name('update.qty.cart');
		Route::get('showcart','FrontendController@getShowCart');
		Route::get('ckeckout','FrontendController@getCheckout');
		Route::get('contact','FrontendController@getContact');
		Route::post('addProductUser','FrontendController@getAddProductUser');

	});
});
