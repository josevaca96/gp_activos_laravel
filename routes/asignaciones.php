<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function(){

   //Tipo_Activos
   Route::post('asignaciones/store' , 'DetalleAsignacion@store')->name('asignaciones.store')
   ->middleware('can:activos.create');

Route::get('asignaciones' , 'DetalleAsignacion@index')->name('asignaciones.index')
   ->middleware('can:activos.index');

Route::get('asignaciones/create' , 'DetalleAsignacion@create')->name('asignaciones.create')
   ->middleware('can:activos.create');

Route::put('asignaciones/{IdE}/{IdO}/{IdD}/{IdAct}' , 'DetalleAsignacion@update')->name('asignaciones.update')
   ->middleware('can:activos.edit');

Route::get('asignaciones/{IdE}/{IdO}/{IdD}/{IdAct}' , 'DetalleAsignacion@show')->name('asignaciones.show');



Route::delete('asignaciones/{IdE}/{IdO}/{IdD}/{IdAct}' , 'DetalleAsignacion@destroy')->name('asignaciones.destroy')
   ->middleware('can:activos.destroy');

Route::get('asignaciones/{IdE}/{IdO}/{IdD}/{IdAct}/edit' , 'DetalleAsignacion@edit')->name('asignaciones.edit')
   ->middleware('can:activos.edit');

   Route::post('asignaciones' , 'DetalleAsignacion@editt')->name('asignaciones.editt');
   Route::get('asignaciones_edit' , 'DetalleAsignacion@asignaciones_edit')->name('asignaciones_edit');

   Route::post('editions', 'DetalleAsignacion@before_edit')->name('editions');

   Route::get('search_client' , 'DetalleAsignacion@search_client')->name('search_client');
   // Route::get('/asignaciones/{IdE}/{IdO}/{IdD}/{IdAct}/edit2', DetalleAsignacion::class);
});
