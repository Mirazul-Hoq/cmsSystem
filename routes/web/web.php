<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// ADMIN ROUTE
Route::middleware('auth')->group(function() {

    Route::get('/admin', 'AdminController@index')->name('admin.index');

});

Route::middleware(['role:Admin', 'auth'])->group(function() {
    Route::get('/admin/user/index', 'UserController@index')->name('admin.user.index');
    Route::put('/role/{user}/attach', 'UserController@attachRole')->name('role.attach');
    Route::put('/role/{user}/detach', 'UserController@detachRole')->name('role.detach');
});

Route::middleware(['can:view,user'])->group(function() {
    Route::get('/admin/user/{user}/profile', 'UserController@profile')->name('admin.user.profile');
});
