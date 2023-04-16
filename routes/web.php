<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\playerController;
use App\Http\Controllers\userController;

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

Route::get('/defaultView', function () {
    return view('welcome');
});

Route::prefix('home')->namespace('home')->group(function () {
    Route::get('/' , [homeController::class, 'index'])->name('home.index');
    Route::get('/filters' , [homeController::class, 'filters'])->name('home.filters');

});

Route::prefix('players')->namespace('players')->group(function () {
    Route::get('/create', [playerController::class, 'create'])->name('players.create');
    Route::post('/store', [playerController::class, 'store'])->name('players.store');
    Route::get('/edit/{id}', [playerController::class, 'edit'])->name('players.edit');
    Route::post('/update', [playerController::class, 'update'])->name('players.update');
    Route::get('/delete/{id}' , [playerController::class, 'delete'])->name('players.delete');
    Route::delete('/destroy', [playerController::class, 'destroy'])->name('players.destroy');
    Route::get('/{id}', [playerController::class, 'show'])->name('players.show');
});
