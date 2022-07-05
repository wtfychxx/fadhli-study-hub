<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;

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
    Route::group(['prefix' => 'book'], function(){
        Route::get('/', [BookController::class, 'index'])->name('book');
        Route::get('/create', [BookController::class, 'show'])->name('book/create');
        Route::get('/edit/{book}', [BookController::class, 'show'])->name('book/edit');
        Route::post('/store', [BookController::class, 'store'])->name('book/store');
        Route::put('/store', [BookController::class, 'edit'])->name('book/update');
        Route::post('/destroy/{book}', [BookController::class, 'destroy'])->name('book/destroy');
    });

    Route::group(['prefix' => 'catalog'], function(){
        Route::get('/', [CatalogController::class, 'index'])->name('catalog');
        Route::post('/store', [CatalogController::class, 'store'])->name('catalog/store');
        Route::get('/filter', [CatalogController::class, 'filter'])->name('catalog/filter');
    });

    Route::group(['prefix' => 'mybook'], function(){
        Route::get('/', [LoanController::class, 'index'])->name('mybook');
        Route::post('/return/{loan}', [LoanController::class, 'edit'])->name('mybook/return');
    });

});
Route::get('actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
