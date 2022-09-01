<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function(){
 
   //Departamentos
   Route::post('departamentos/store' , 'DepartamentoController@store')->name('departamentos.store')
   ->middleware('can:activos.create');

Route::get('departamentos' , 'DepartamentoController@index')->name('departamentos.index')
   ->middleware('can:activos.index');

Route::get('departamentos/create' , 'DepartamentoController@create')->name('departamentos.create')
   ->middleware('can:activos.create');

Route::put('departamentos/{departamento}' , 'DepartamentoController@update')->name('departamentos.update')
   ->middleware('can:activos.edit');

Route::get('departamentos/{departamento}' , 'DepartamentoController@show')->name('departamentos.show')
   ->middleware('can:activos.show');

Route::delete('departamentos/{departamento}' , 'DepartamentoController@destroy')->name('departamentos.destroy')
   ->middleware('can:activos.destroy');
       
Route::get('departamentos/{departamento}/edit' , 'DepartamentoController@edit')->name('departamentos.edit')
   ->middleware('can:activos.edit');
});