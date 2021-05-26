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


Route::get('/blogposts', 'App\Http\Controllers\PostController@getAllPosts');

Route::get('/tags', 'App\Http\Controllers\TagController@getAllTags');
Route::get('/tags/{post}', 'App\Http\Controllers\TagController@getTagsByPost');

Route::post('/post/store', 'App\Http\Controllers\PostController@store');

Route::get('/get/{id}', 'App\Http\Controllers\PostController@getPost');

Route::get('/comments/{id}', 'App\Http\Controllers\CommentController@getCommentsByPost');

Route::POST('/newcomment', 'App\Http\Controllers\CommentController@storeComment');

Route::get('/user/posts/{id}', 'App\Http\Controllers\PostController@getPostsByUser');


require __DIR__.'/auth.php';
//require __DIR__.'/api.php';