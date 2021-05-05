<?php

use Illuminate\Support\Facades\Route;
use App\Blog;

Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::get('/posts/{post}', 'PostsController@show');
Route::delete('/posts/{post}', 'PostsController@destroy');
Route::put('/posts/{post}', 'PostsController@update');