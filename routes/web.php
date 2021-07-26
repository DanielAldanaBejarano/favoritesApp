<?php

use Illuminate\Support\Facades\Route;
/* Import favorite controller */
use App\Http\Controllers\FavoriteController;

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
    return view('auth.login');
});

/* Redirect to routes */

Route::resource('favorites',FavoriteController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [FavoriteController::class, 'index'])->name('home');

/* Auth loggin to redirect */
Route::prefix(['middleware' => 'auth'], function () {
    /* Redirect logged user to index */
    Route::get('/', [FavoriteControllerHomeController::class, 'index'])->name('home');
});