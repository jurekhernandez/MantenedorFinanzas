<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/uno','LoginController@uno');
Route::view('/login','login')->name('login');
Route::post('/login','LoginController@login');


Route::group(['middleware'=>'auth'], function(){
    Route::post('/logout','LoginController@logout')->name("logout");

    Route::get('/ingresos','FinanzasController@Listadoingresos')->name('ingreso.listado');
    Route::post('/registrarIngreso','FinanzasController@registrarIngreso')->name("ingreso.registrar");
    Route::put('/anularIngreso/{id}','FinanzasController@anularIngreso')->name('ingreso.anular');
    Route::patch('/anularIngreso/{id}','FinanzasController@anularIngreso')->name('ingreso.anular');

    Route::get('/egresos','FinanzasController@ListadoEgresos')->name('egreso.listado');
    Route::post('/registrarEgreso','FinanzasController@registrarEgreso')->name("egreso.registrar");
    Route::put('/anularEgreso/{id}','FinanzasController@anularEgreso')->name('egreso.anular');
    Route::patch('/anularEgreso/{id}','FinanzasController@anularEgreso')->name('egreso.anular');


    Route::get("/usuarios","UsuariosController@index");
    Route::get("/show/{id}","UsuariosController@show");
    Route::post("/usuario","UsuariosController@registrar");
    Route::put("/usuario/{id}","UsuariosController@update");
    Route::patch("/usuario/{id}","UsuariosController@update");

    Route::get("/reportes","ReporteController@index");
    Route::post("/reporte","ReporteController@reporte");


    Route::get('/', function () {
        return view('base.base');
    });
});
