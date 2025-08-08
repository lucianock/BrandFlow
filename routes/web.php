<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

/*##### crud de marcas #####*/
Route::get('/marcas', [ MarcaController::class, 'index' ])
        ->middleware('auth')->name('marcas');
Route::get('/marca/create', [ MarcaController::class, 'create' ])
        ->middleware('auth');
Route::post('/marca/store', [ MarcaController::class, 'store' ])
        ->middleware('auth');
Route::get('/marca/edit/{marca}', [ MarcaController::class, 'edit' ])
        ->middleware('auth');
Route::put('/marca/update/{marca}', [ MarcaController::class, 'update' ])
        ->middleware('auth');
Route::delete('/marca/delete/{marca}', [ MarcaController::class, 'destroy' ])
        ->middleware('auth');

/*##### crud de categorías #####*/
Route::get('/categorias', [ CategoriaController::class, 'index' ])
        ->middleware('auth')->name('categorias');
Route::get('/categoria/create', [ CategoriaController::class, 'create' ])
        ->middleware('auth');
Route::post('/categoria/store', [ CategoriaController::class, 'store' ])
        ->middleware('auth');
Route::get('/categoria/edit/{categoria}', [ CategoriaController::class, 'edit' ])
        ->middleware('auth');
Route::put('/categoria/update/{categoria}', [ CategoriaController::class, 'update' ])
        ->middleware('auth');
Route::delete('/categoria/delete/{categoria}', [ CategoriaController::class, 'destroy' ])
        ->middleware('auth');

/*##### crud de productos #####*/
Route::get('/productos', [ ProductoController::class, 'index' ])
        ->middleware('auth')->name('productos');
Route::get('/producto/create', [ ProductoController::class, 'create' ])
        ->middleware('auth');
Route::post('/producto/store', [ ProductoController::class, 'store' ])
        ->middleware('auth');
Route::get('/producto/edit/{producto}', [ ProductoController::class, 'edit' ])
        ->middleware('auth');
Route::put('/producto/update/{producto}', [ ProductoController::class, 'update' ])
        ->middleware('auth');
Route::delete('/producto/delete/{producto}', [ ProductoController::class, 'destroy' ])
        ->middleware('auth');

/*##### estadísticas #####*/
Route::get('/estadisticas', [ EstadisticasController::class, 'index' ])
        ->middleware('auth')->name('estadisticas');
Route::get('/estadisticas/exportar', [ EstadisticasController::class, 'exportar' ])
        ->middleware('auth')->name('estadisticas.exportar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
