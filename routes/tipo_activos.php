<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function(){
 
   //Tipo_Activos
   Route::post('tipo_activos/store' , 'TipoActivosController@store')->name('tipo_activos.store')
   ->middleware('can:activos.create');

Route::get('tipo_activos' , 'TipoActivosController@index')->name('tipo_activos.index')
   ->middleware('can:activos.index');

Route::get('tipo_activos/create' , 'TipoActivosController@create')->name('tipo_activos.create')
   ->middleware('can:activos.create');

Route::put('tipo_activos/{tipo_activo}' , 'TipoActivosController@update')->name('tipo_activos.update')
   ->middleware('can:activos.edit');

Route::get('tipo_activos/{tipo_activo}' , 'TipoActivosController@show')->name('tipo_activos.show')
   ->middleware('can:activos.show');

Route::delete('tipo_activos/{tipo_activo}' , 'TipoActivosController@destroy')->name('tipo_activos.destroy')
   ->middleware('can:activos.destroy');
       
Route::get('tipo_activos/{tipo_activo}/edit' , 'TipoActivosController@edit')->name('tipo_activos.edit')
   ->middleware('can:activos.edit');
});