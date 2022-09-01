<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function(){
 
   //Empresas
   Route::post('empresas/store' , 'EmpresasController@store')->name('empresas.store')
   ->middleware('can:activos.create');

Route::get('empresas' , 'EmpresasController@index')->name('empresas.index')
   ->middleware('can:activos.index');

Route::get('empresas/create' , 'EmpresasController@create')->name('empresas.create')
   ->middleware('can:activos.create');

Route::put('empresas/{empresa}' , 'EmpresasController@update')->name('empresas.update')
   ->middleware('can:activos.edit');

Route::get('empresas/{empresa}' , 'EmpresasController@show')->name('empresas.show')
   ->middleware('can:activos.show');

Route::delete('empresas/{empresa}' , 'EmpresasController@destroy')->name('empresas.destroy')
   ->middleware('can:activos.destroy');
       
Route::get('empresas/{empresa}/edit' , 'EmpresasController@edit')->name('empresas.edit')
   ->middleware('can:activos.edit');
});