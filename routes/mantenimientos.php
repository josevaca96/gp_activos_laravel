<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function(){

   //Oficinas
   Route::post('mantenimientos/store' , 'MantenimientoController@store')->name('mantenimientos.store')
   ->middleware('can:mantenimientos.create');

Route::get('mantenimientos' , 'MantenimientoController@index')->name('mantenimientos.index')
   ->middleware('can:mantenimientos.index');

Route::get('mantenimientos/create' , 'MantenimientoController@create')->name('mantenimientos.create')
    ->middleware('can:mantenimientos.create');

Route::put('mantenimientos/{mantenimiento}' , 'MantenimientoController@update')->name('mantenimientos.update')
   ->middleware('can:mantenimientos.edit');

Route::get('mantenimientos/{mantenimiento}' , 'MantenimientoController@show')->name('mantenimientos.show')
   ->middleware('can:mantenimientos.show');

Route::delete('mantenimientos/{mantenimiento}' , 'MantenimientoController@destroy')->name('mantenimientos.destroy')
   ->middleware('can:mantenimientos.destroy');

Route::get('mantenimientos/{mantenimiento}/edit' , 'MantenimientoController@edit')->name('mantenimientos.edit')
   ->middleware('can:mantenimientos.edit');
});
