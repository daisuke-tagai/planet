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

Auth::routes();

Route::prefix('admin')
->namespace('Admin')
->name('admin.')
->group(function() {
    Auth::routes([
        // 'register' => false,
        'reset' => false,
        'confirm' => false,
        'verify' => false,
    ]);

    Route::get('/home', 'AdminController@index')
    ->name('admin.home');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/info', 'InfoController@index')->name('info');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/search', 'PostController@search')->name('posts.search');
Route::get('/feature', 'FeatureController@index')->name('feature.index');


Route::resource('/posts', 'PostController', ['except'=>['index']]);
Route::resource('/users', 'UserController');
Route::resource('/comments', 'CommentController');
Route::resource('/feature', 'FeatureController', ['except'=>['index']]);
Route::resource('/articles', 'ArticleController');
Route::resource('/categories', 'CategoryController');

