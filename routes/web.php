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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','ProductController@show_product');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Users
Route::get('users','UserController@index');
Route::get('users/json','UserController@json');
// Products
Route::get('product','ProductController@index');
Route::get('product/json','ProductController@json');
Route::get('product/tambah','ProductController@tambah');
Route::post('product/aksi_tambah','ProductController@aksi_tambah');
Route::get('product/edit/{code}','ProductController@edit');
Route::put('product/update/{code}','ProductController@update');
Route::get('product/hapus/{code}','ProductController@hapus');
Route::get('product/trash','ProductController@trash');
Route::get('/product/kembalikan/{code}', 'ProductController@kembalikan');
Route::get('/product/kembalikan_semua', 'ProductController@kembalikan_semua');
Route::get('/product/hapus_permanen/{code}', 'ProductController@hapus_permanen');
Route::get('/product/hapus_permanen_semua', 'ProductController@hapus_permanen_semua');

// Order
// Route::get('/pegawai','PegawaiController@index');


