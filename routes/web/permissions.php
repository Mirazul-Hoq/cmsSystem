<?php

use Illuminate\Support\Facades\Route;

Route::get('/user/permission', 'PermissionController@index')->name('permission.index');
Route::post('/user/permission', 'PermissionController@store')->name('permission.store');
Route::get('/user/permission/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
Route::patch('/user/permission/{permission}/update', 'PermissionController@update')->name('permission.update');
Route::delete('/user/permission/{permission}/destroy', 'PermissionController@destroy')->name('permission.destroy');
Route::put('/user/{role}/permission/attach', 'PermissionController@attachPermission')->name('permission.attach');
Route::put('/user/{role}/permission/detach', 'PermissionController@detachPermission')->name('permission.detach');