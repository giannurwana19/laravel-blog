<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'BlogController@index');

Route::get('/isi-post/{slug}', 'BlogController@isi_post')->name('blog.isi');

Route::get('/list-post', 'BlogController@listBlog')->name('blog.list');

// yang kita kirim ke getRouteKeyName adalah modelnya, walaupun yang kita tangkap adalah slug (laravel 6)
// menambahkan :slug dan menghilangkan method getRouteKeyNAme
Route::get('/list-category/{category:slug}', 'BlogController@listCategory')->name('blog.category');

Route::get('/search', 'BlogController@search')->name('blog.search');

// kita masukkan route kita ke dalam route group agar user harus login dulu
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');

    Route::get('/post/show_delete', 'PostController@show_delete')->name('post.show_delete');

    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

    Route::delete('/post/force_delete/{id}', 'PostController@force_delete')->name('post.force_delete');

    Route::resource('/post', 'PostController');

    Route::resource('/user', 'UserController');
});







