<?php

use Illuminate\Support\Facades\Route;
use Iya30n\DynamicAcl\Models\Role;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentaController;
use App\Http\Controllers\MembresiaController;
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

Route::group(['prefix' => 'home'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/adminn', [App\Http\Controllers\HomeController::class, 'adminn'])->name('adminn');
});

Route::get('/vendor/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::group(['prefix' => 'movie'], function () {
    Route::get('/', [MovieController::class, 'showStore'])->name('movie.index');
    Route::get('/rent/{movie_id}', [RentaController::class, 'create'])->name('renta.create');
});


Route::group(['prefix' => 'renta'], function () {
    Route::get('/', [MovieController::class, 'showStore'])->name('movie');
    Route::get('/create/{movie_id}', [RentaController::class, 'create'])->name('renta.create');
    // Otras rutas relacionadas con rentas según tus necesidades
});

Route::group(['prefix' => 'rentas'], function () {
    Route::get('/', [RentaController::class, 'index'])->name('rentas');
    // Otras rutas relacionadas con rentas según tus necesidades
});

Route::get('/membresia', [MembresiaController::class, 'show'])->name('membresia');