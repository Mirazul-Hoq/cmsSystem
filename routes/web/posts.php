<?php

use Illuminate\Support\Facades\Route;


// BLOG POST
Route::get('/post/{post}', 'PostController@show')->name('blog.post');

Route::middleware('auth')->group(function() {

    Route::get('/admin/post/create', 'PostController@create')->name('admin.post.create');
    Route::post('/admin/post/store', 'PostController@store')->name('admin.post.store');
    Route::get('/admin/posts/', 'PostController@index')->name('admin.post.index');
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('admin.post.edit');
    Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('admin.post.destroy');
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('admin.post.update');


});