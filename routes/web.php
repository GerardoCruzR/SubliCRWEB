<?php

use App\Http\Controllers\TruckController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\FiltroController2;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AboutController;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about-us', [AboutController::class, 'show'])->name('about-us');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('trucks', TruckController::class);
    Route::patch('/trucks/{id}/toggle-disponible', [TruckController::class, 'toggleDisponible'])->name('trucks.toggleDisponible');
    Route::get('trucks/{id}/documentacion', [TruckController::class, 'showDocumentacion'])->name('trucks.documentacion');
});

Route::get('/unidades/{id}', [UnidadesController::class, 'show'])->name('unidades.show');
Route::patch('/cajas/{id}/toggle-disponible', [CajaController::class, 'toggleDisponible'])->name('cajas.toggleDisponible');
Route::get('/unidades-en-venta', [UnidadesController::class, 'unidadesEnVenta'])->name('unidades.en.venta');
Route::get('/cajas-en-venta', [CajaController::class, 'cajasEnVenta'])->name('cajas.en.venta');

Route::resource('cajas', CajaController::class);
Route::get('/cajas', [CajaController::class, 'index'])->name('cajas.index');
Route::delete('/cajas/{id}', [CajaController::class, 'destroy'])->name('cajas.destroy');
Route::get('/cajas/{id}', [CajaController::class, 'show'])->name('cajas.show');

Route::get('/personaliza', fn () => view('personaliza'));

Route::resource('filtros', FiltroController::class)->middleware('auth');
Route::get('/filtros', [FiltroController2::class, 'index'])->name('filtros.index');
Route::get('/filtros/create', [FiltroController2::class, 'create'])->name('filtros.create');
Route::post('/filtros', [FiltroController2::class, 'store'])->name('filtros.store');
Route::get('/filtros/{id}/edit', [FiltroController2::class, 'edit'])->name('filtros.edit');
Route::put('/filtros/{id}', [FiltroController2::class, 'update'])->name('filtros.update');
Route::delete('/filtros/{id}', [FiltroController2::class, 'destroy'])->name('filtros.destroy');
Route::get('/get-tipos/{seccion}', [FiltroController2::class, 'getTiposBySeccion']);
Route::get('/get-tipos-by-seccion', [FiltroController::class, 'getTiposBySeccion']);

Route::get('/catalogo', [ProductoController::class, 'showPublicList'])->name('catalogo.publico');
Route::resource('productos', ProductoController::class)->except(['show']);
Route::get('productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
