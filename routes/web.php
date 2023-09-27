<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\LugarPrestacionController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Proyectos_ofertadosController;
use App\Http\Controllers\MenuController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/area', AreaController::class);

Route::resource('/coordinador', CoordinadorController::class);

Route::resource('/proyectos_ofertados', Proyectos_ofertadosController::class);

Route::resource('/menu', MenuController::class);

Route::resource('/FormularioLugarP', LugarPrestacionController::class);

Route::post('/ruta-para-store', [LugarPrestacionController::class, 'store'])->name('formularioLugarPrestacion.store');

Route::post('/ruta-para-actualizar/{idlugar_prestacion}', [LugarPrestacionController::class, 'update'])->name('formularioLugarPrestacion.update');

Route::get('/ruta-para-editar/{idlugar_prestacion}', [LugarPrestacionController::class, 'edit'])->name('formularioLugarPrestacion.edit');

Route::delete('lugar_prestacion/{id}', [LugarPrestacionController::class, 'destroy'])->name('lugar_prestacion.destroy');

Route::get('datos-lugar-prestacion', [LugarPrestacionController::class, 'index'])->name('DatosLugarPrestacion.index');





