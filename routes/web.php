<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('ventas/create', 'VentaController@create')->name('ventas.create')
        ->middleware('can:ventas.create');

Route::get('empleados/create', 'EmpleadoController@create')->name('empleados.create')
        ->middleware('can:empleados.create');

Route::get('reporte_productos', 'PDFController@PDFProductos')->name('reporte_productos')
        ->middleware('can:reporte_productos.index');

Route::get('reporte_ventas', 'PDFController@PDFVentas')->name('reporte_ventas')
        ->middleware('can:reporte_ventas.index');

//PROBANDO RUTAS PARA PETICIONES HTTP 
Route::get('buscarclientes', 'PDFController@PDFVentas')->name('reporte_ventas')
        ->middleware('can:reporte_ventas.index');


// componente ventas
Route::view('ventaslw', 'ventaslw')->name('ventaslw');
Route::view('reporteslw', 'reporteslw')->name('reporteslw');
Route::get('reportes/pdf/{folio}', 'ReportesPdfController@Export2Pdf')->name('reportespdf');
