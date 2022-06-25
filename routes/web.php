<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::middleware('auth')->group(function(){

    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Book Router
    Route::get('book', [BookController::class, 'index'])->name('book');
    Route::get('book/create', [BookController::class, 'show'])->name('book/create');
    Route::get('book/edit/{book}', [BookController::class, 'show'])->name('book/edit');
    Route::post('book/store', [BookController::class, 'store'])->name('book/store');
    Route::put('book/store', [BookController::class, 'edit'])->name('book/store');
    Route::delete('book/destroy/{book}', [BookController::class, 'destroy'])->name('book/destroy');


});
Route::get('actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
