<?php

use App\Http\Controllers\TruckController;
use App\Http\Controllers\UnidadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\FiltroController2;
use App\Http\Controllers\ProductoController;



// Ruta de inicio, redirige a la vista 'welcome'
Route::get('/', [UnidadController::class, 'index']);

Route::get('/about-us', [App\Http\Controllers\AboutController::class, 'show'])->name('about-us');

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Rutas para el controlador Truck
    Route::resource('trucks', TruckController::class); // CRUD completo para la entidad 'Truck'
    // Rutas de administración para productos
    Route::resource('products', ProductoController::class)->except(['show']);
});

// Ruta para mostrar detalles de una unidad específica
Route::get('/unidades/{id}', [UnidadesController::class, 'show'])->name('unidades.show');

// Ruta para cambiar disponibilidad de una unidad
Route::patch('/trucks/{id}/toggle-disponible', [TruckController::class, 'toggleDisponible'])->name('trucks.toggleDisponible');

// Ruta para cambiar disponibilidad de una caja
Route::patch('/cajas/{id}/toggle-disponible', [CajaController::class, 'toggleDisponible'])->name('cajas.toggleDisponible');

// Ruta para mostrar la documentación de un truck
Route::get('trucks/{id}/documentacion', [TruckController::class, 'showDocumentacion'])->name('trucks.documentacion');

// Ruta para ver unidades en venta
Route::get('/unidades-en-venta', [UnidadesController::class, 'unidadesEnVenta'])->name('unidades.en.venta');

// Ruta para ver cajas en venta
Route::get('/cajas-en-venta', [CajaController::class, 'cajasEnVenta'])->name('cajas.en.venta');

// CRUD completo para la entidad 'Caja'
Route::resource('cajas', CajaController::class);

// Ruta para mostrar el listado de cajas
Route::get('/cajas', [CajaController::class, 'index'])->name('cajas.index');

// Ruta para eliminar una caja
Route::delete('/cajas/{id}', [CajaController::class, 'destroy'])->name('cajas.destroy');

// Ruta para mostrar detalles de una caja específica
Route::get('/cajas/{id}', [CajaController::class, 'show'])->name('cajas.show');

Route::get('/personaliza', function () {
    return view('personaliza');
});


// Rutas para el controlador Filtro
Route::resource('filtros', FiltroController::class)->middleware('auth');


// Ruta para mostrar la lista de filtros
Route::get('/filtros', [FiltroController2::class, 'index'])->name('filtros.index');

// Ruta para crear un nuevo filtro
Route::get('/filtros/create', [FiltroController2::class, 'create'])->name('filtros.create');

// Ruta para almacenar un nuevo filtro
Route::post('/filtros', [FiltroController2::class, 'store'])->name('filtros.store');

// Ruta para editar un filtro
Route::get('/filtros/{id}/edit', [FiltroController2::class, 'edit'])->name('filtros.edit');

// Ruta para actualizar un filtro existente
Route::put('/filtros/{id}', [FiltroController2::class, 'update'])->name('filtros.update');

// Ruta para eliminar un filtro
Route::delete('/filtros/{id}', [FiltroController2::class, 'destroy'])->name('filtros.destroy');

// Ruta para obtener los tipos de filtros por sección vía AJAX
Route::get('/get-tipos/{seccion}', [FiltroController2::class, 'getTiposBySeccion']);

Route::get('/catalogo', [TruckController::class, 'showPublicList'])->name('trucks.public');
Route::get('/filtros', [FiltroController::class, 'index'])->name('filtros.index');
Route::get('/filtros/create', [FiltroController::class, 'create'])->name('filtros.create');
Route::post('/filtros', [FiltroController::class, 'store'])->name('filtros.store');
Route::get('/filtros/{id}/edit', [FiltroController::class, 'edit'])->name('filtros.edit');
Route::patch('/filtros/{id}', [FiltroController::class, 'update'])->name('filtros.update');
Route::delete('/filtros/{id}', [FiltroController::class, 'destroy'])->name('filtros.destroy');
Route::get('/get-tipos-by-seccion', [FiltroController::class, 'getTiposBySeccion']);

// Catálogo público de productos
Route::get('/', [ProductoController::class, 'showPublicList'])->name('catalogo.publico');
Route::get('/catalogo', [ProductoController::class, 'showPublicList'])->name('catalogo.publico');
Route::get('productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
