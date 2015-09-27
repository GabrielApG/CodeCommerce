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

Route::get('/', 'StoreController@index');

Route::get('home', 'HomeController@index');

Route::get('exemplo', 'WelcomeController@exemplo');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/*
 * Route com nome, facilita se precisar de mudar de rota, não precisa de muda o link do direcionamento direto na aplicação.
 * Route::get('admin/categories',['as'=>'categories','uses'=>'CategoriesController@index']);
 * */


Route::group(['prefix'=>'admin','where'=>['id'=>'[0-9]+']],function(){

	Route::group(['prefix'=>'categories','where'=>['id'=>'[0-9]+']],function(){

		Route::get('',['as'=>'categories','uses'=>'CategoriesController@index']);
		Route::post('',['as'=>'categories.store','uses'=>'CategoriesController@store']);
		Route::get('create',['as'=>'categories.create','uses'=>'CategoriesController@create']);
		Route::get('{id}/destroy',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy']);
		Route::get('{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
		Route::any('{id}/update',['as'=>'categories.update','uses'=>'CategoriesController@update']);
	});

	Route::group(['prefix'=>'product','where'=>['id'=>'[0-9]+']],function(){
		Route::get('',['as'=>'product','uses'=>'ProductsController@index']);
		Route::get('create',['as'=>'product.create','uses'=>'ProductsController@create']);
		Route::post('',['as'=>'product.store','uses'=>'ProductsController@store']);

		/*Rota das Imagens*/
		Route::group(['prefix'=>'images'],function(){
			Route::get('{id}/product',['as'=>'product.images','uses'=>'ProductsController@images']);
			Route::get('create/{id}/product',['as'=>'product.images.create','uses'=>'ProductsController@createImage']);
			Route::post('store/{id}/product',['as'=>'product.images.store','uses'=>'ProductsController@storeImage']);
			Route::get('destroy/{id}/product',['as'=>'product.images.destroy','uses'=>'ProductsController@destroyImage']);

		});
	});
});





