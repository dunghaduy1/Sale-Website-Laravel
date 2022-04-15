<?php

Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
	Route::get('login', 'BackendController@login')->name('login');
	Route::post('login', 'BackendController@postLogin');
	Route::get('logout', 'BackendController@logout')->name('logout');
	Route::get('/', 'BackendController@index')->name('backend');
	Route::resources(['category' => 'CategoryController']);
	Route::resources(['product' => 'ProductController']);
	Route::resources(['attr' => 'AttrController']);
	Route::resources(['user' => 'UserController']);
	// Product_detail
	Route::get('product/{id}/product_detail', 'Product_detailController@index')->name('product_detail_backend');
	Route::post('product/{id}/product_detail/', 'Product_detailController@store');
	Route::get('product/{id}/product_detail/{id_detail}/edit', 'Product_detailController@edit')->name('edit_product_detail_backend');
	Route::post('product/{id}/product_detail/{id_detail}/edit', 'Product_detailController@update');
	Route::get('product/{id}/product_detail/{id_detail}/delete', 'Product_detailController@destroy')->name('destroy_product_detail_backend');
	Route::resources(['blog' => 'BlogController']);
	Route::resources(['banner' => 'BannerController']);
	Route::resources(['config' => 'ConfigController']);
	Route::resources(['feedback' => 'FeedbackController']);
	Route::resources(['logo' => 'LogoController']);
	Route::resources(['ads' => 'AdsController']);
	Route::resources(['contact' => 'ContactController']);
	//order
	Route::get('order', 'OrderController@index')->name('order_backend');
	Route::get('order/{id}/order_detail', 'Order_detailController@index')->name('order_detail_backend');
	Route::post('order/{id}/order_detail', 'Order_detailController@update');
	Route::get('thong-ke/ton-kho', 'StatisticalController@tonKho')->name('thong-ke-ton-kho');
	Route::get('thong-ke/ban-chay', 'StatisticalController@banChay')->name('thong-ke-ban-chay');
	Route::get('thong-ke/doanh-thu', 'StatisticalController@doanhThu')->name('thong-ke-doanh-thu');
});
