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

Route::prefix('home')->namespace('home')->controller(homeController::class)->group(function () {
    Route::get('/' , 'index')->name('home.index');
    Route::get('/' , 'filters')->name('home.filters');

});

Route::prefix('players')->namespace('players')->controller(playerController::class)->group(function () {
    Route::get('/{id}', 'show')->name('players.show');
    Route::get('/create', 'create')->name('players.create');
    Route::post('/store', 'store')->name('players.store');
    Route::get('/edit', 'edit')->name('players.edit');
    Route::post('/update', 'update')->name('players.update');
    Route::post('/delete', 'delete')->name('players.delete');
});
