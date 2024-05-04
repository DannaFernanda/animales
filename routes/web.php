<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  // Assuming this is for blog posts

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/animales', [App\Http\Controllers\AnimaleController::class, 'index'])->name('animales.index');

// Existing protected routes
Route::resource('animales', App\Http\Controllers\AnimaleController::class)->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// New page routes
Route::get('/inicio', function () {
    return view('inicio');  // Replace with your actual view name
});

Route::get('/contactenos', function () {
    return view('contactenos');  // Replace with your actual view name
});
Route::get('/sede', function () {
    return view('sede');  // Replace with your actual view name
});
Route::get('/donaciones', function () {
    return view('donaciones');  // Replace with your actual view name
});

Route::post('/adoptar', [App\Http\Controllers\AdoptaController::class, 'guardarAdopcion'])->name('adoptar');

// Filtrado de imágenes
Route::get('/filtro/{categoria}', [App\Http\Controllers\InicioController::class, 'filtrarImagenes'])->name('filtro.imagenes');

Route::post('/guardar-comentario', [App\Http\Controllers\ComentarioController::class, 'store'])->name('guardar-comentario');

Route::get('/mostrarComentarios', [App\Http\Controllers\ComentarioController::class, 'mostrarComentarios'])->name('mostrarComentarios');
// Existing named route (assuming it's not related to the new pages)
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/adopta', [App\Http\Controllers\AdoptaController::class, 'index'])->name('adopta.index');
