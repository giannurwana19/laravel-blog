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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('home');
})->name('home');




Route::resource('/category', 'CategoryController');
Route::resource('/tag', 'TagController');


Route::get('/post/show_delete', 'PostController@show_delete')->name('post.show_delete');

Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

Route::delete('/post/force_delete/{id}', 'PostController@force_delete')->name('post.force_delete');

Route::resource('/post', 'PostController');