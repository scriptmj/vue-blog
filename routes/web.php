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

Route::get('/blogposts', 'App\Http\Controllers\PostController@getPosts');

Route::get('/tags', 'App\Http\Controllers\TagController@getTags');
Route::get('/chosentags', 'App\Http\Controllers\TagController@getChosenTags');

Route::post('/sendnewpost', 'App\Http\Controllers\PostController@store');

Route::get('/view/{id}', 'App\Http\Controllers\PostController@getPostById');