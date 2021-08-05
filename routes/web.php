<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PageController@index')->name('homepage');
Route::get('/all','PageController@all')->name('allpage');
Route::get('/cart','PageController@cart')->name('cartpage');
Route::get('/contact','PageController@contact')->name('contactpage');
Route::get('/offer','PageController@offer')->name('offerpage');
Route::get('/login','PageController@login')->name('loginpage');
Route::get('/register','PageController@register')->name('registerpage');
Route::get('/detail','PageController@detail')->name('detailpage');

Route::resource('category', 'CategoryController');
Route::resource('subcategory', 'SubcategoryController');
Route::resource('item','ItemController');
Route::resource('order','OrderController');
Route::resource('rating','RatingController');
Route::resource('comment', 'CommentController');
