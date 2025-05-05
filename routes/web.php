<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;


Route::get('/', [ProductsController::class, 'home'])->name('welcome'); // Ruta para la página de inicio
Route::get('/search', [ProductsController::class, 'search'])->name('welcome');

Route::prefix('products')->group(function () {
    //Agrupa el controlador
    Route::controller(ProductsController::class)->group(function () {
        /*  Route::get('/',             'home')->name('welcome'); */
        //Listado
        Route::get('',             'index')->name('products.index');
        //Crear
        Route::get('create',       'create')->name('products.create');
        //Guardar
        Route::post('',            'store')->name('products.store');
        //Mostrar
      /*   Route::get('{product}',    'show')->name('products.show'); */
        //Editar
        Route::get('{product}/edit', 'edit')->name('products.edit');
        //Actualizar
        Route::put('{product}',    'update')->name('products.update');
        //Eliminar
        Route::delete('{product}',  'destroy')->name('products.destroy');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
