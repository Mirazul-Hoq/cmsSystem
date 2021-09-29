<?php


use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    
    Route::put('/admin/user/{user}/update', 'UserController@update')->name('admin.user.update');
    Route::delete('/admin/user/{user}/destroy', 'UserController@destroy')->name('admin.user.destroy');

});