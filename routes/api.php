<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blogposts', 'App\Http\Controllers\PostController@getAllPosts');

Route::get('/tags', 'App\Http\Controllers\TagController@getAllTags');
Route::get('/tags/{post}', 'App\Http\Controllers\TagController@getTagsByPost');

Route::post('/post/store', 'App\Http\Controllers\PostController@store');
Route::post('/post/edit/{id}', 'App\Http\Controllers\PostController@update');

Route::get('/blogposts/tag/{id}', 'App\Http\Controllers\PostController@getPostsByTag');

Route::get('/get/{id}', 'App\Http\Controllers\PostController@getPost');

Route::get('/comments/{id}', 'App\Http\Controllers\CommentController@getCommentsByPost');

Route::POST('/newcomment', 'App\Http\Controllers\CommentController@storeComment');

Route::get('/user/posts/{id}', 'App\Http\Controllers\PostController@getPostsByUser');
