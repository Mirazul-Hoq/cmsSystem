<?php

use Illuminate\Support\Facades\Route;

Route::get('/user/role', 'RoleController@index')->name('role.index');
Route::post('/user/role/store', 'RoleController@store')->name('role.store');
Route::delete('/user/role/{role}/destroy', 'RoleController@destroy')->name('role.destroy');
Route::get('/user/role/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::patch('/user/role/{role}/update', 'RoleController@update')->name('role.update');