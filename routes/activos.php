<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function(){
 
   //Activos
   Route::post('activos/store' , 'ActivosController@store')->name('activos.store')
   ->middleware('can:activos.create');

Route::get('activos' , 'ActivosController@index')->name('activos.index')
   ->middleware('can:activos.index');

Route::get('activos/create' , 'ActivosController@create')->name('activos.create')
   ->middleware('can:activos.create');

Route::put('activos/{activo}' , 'ActivosController@update')->name('activos.update')
   ->middleware('can:activos.edit');

Route::get('activos/{activo}' , 'ActivosController@show')->name('activos.show')
   ->middleware('can:activos.show');

Route::delete('activos/{activo}' , 'ActivosController@destroy')->name('activos.destroy')
   ->middleware('can:activos.destroy');
       
Route::get('activos/{activo}/edit' , 'ActivosController@edit')->name('activos.edit')
   ->middleware('can:activos.edit');
});