<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function(){
 
   //Oficinas
   Route::post('oficinas/store' , 'OficinasController@store')->name('oficinas.store')
   ->middleware('can:activos.create');

Route::get('oficinas' , 'OficinasController@index')->name('oficinas.index')
   ->middleware('can:activos.index');

Route::get('oficinas/create' , 'OficinasController@create')->name('oficinas.create')
   ->middleware('can:activos.create');

Route::put('oficinas/{oficina}' , 'OficinasController@update')->name('oficinas.update')
   ->middleware('can:activos.edit');

Route::get('oficinas/{oficina}' , 'OficinasController@show')->name('oficinas.show')
   ->middleware('can:activos.show');

Route::delete('oficinas/{oficina}' , 'OficinasController@destroy')->name('oficinas.destroy')
   ->middleware('can:activos.destroy');
       
Route::get('oficinas/{oficina}/edit' , 'OficinasController@edit')->name('oficinas.edit')
   ->middleware('can:activos.edit');
});