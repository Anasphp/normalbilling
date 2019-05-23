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

Route::get('/', 'LoginController@index');

Route::get('/login', ['as'=>'/login','uses'=>'LoginController@index']);

Route::post('/login', ['as'=>'login','uses'=>'LoginController@login']);

Route::get('/logout', ['as'=>'logout','uses'=>'LoginController@logout']);

Route::get('/index', ['as'=>'index','uses'=>'BillingController@dashboard']);

Route::get('/addProducts', ['as'=>'addProducts','uses'=>'ProductController@index']);

Route::post('/addProducts', ['as'=>'addProducts','uses'=>'ProductController@addProducts']);

Route::get('/listProducts', ['as'=>'listProducts','uses'=>'ProductController@listProducts']);

Route::get('/setGst', ['as'=>'setGst','uses'=>'GstController@index']);

Route::post('/setGst', ['as'=>'setGst','uses'=>'GstController@setGst']);

Route::get('/createBill', ['as'=>'createBill','uses'=>'BillingController@index']);

Route::post('/createBill', ['as'=>'createBill','uses'=>'BillingController@createBill']);

Route::get('/listBill', ['as'=>'listBill','uses'=>'BillingController@listBill']);

Route::post('/suggestion/fetch', 'BillingController@fetch')->name('suggestion.fetch');

// Route::get('/autocomplete', array('as' => 'autocomplete', 'uses'=>'BillingController@fetch'));


// Route::get('search/autocomplete', 'BillingController@autocomplete');
Route::get('search/autocomplete',array('as'=>'search/autocomplete','uses'=>'BillingController@autocomplete'));


// Route::get('search/autocomplete', 'BillingController@autocomplete');


Route::get('autocomplete-search',array('as'=>'autocomplete.search','uses'=>'BillingController@index'));

Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'BillingController@ajaxData'));

// Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'BillingController@ajaxData'));


Route::post('/addCurrentProduct', ['as'=>'addCurrentProduct','uses'=>'BillingController@addCurrentProduct']);

Route::post('/deleteCurrentProduct', ['as'=>'deleteCurrentProduct','uses'=>'BillingController@deleteCurrentProduct']);

Route::post('/billView', 'BillingController@billView');

Route::get('cancelOrder',array('as'=>'cancelOrder','uses'=>'BillingController@cancelOrder'));

Route::get('submitOrder',array('as'=>'submitOrder','uses'=>'BillingController@submitOrder'));

Route::get('/user/find', 'BillingController@searchProducts');

Route::post('/getSizePrice', ['as'=>'getSizePrice','uses'=>'BillingController@getSizePrice']);







