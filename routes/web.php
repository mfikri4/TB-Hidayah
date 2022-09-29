<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
use App\Http\Middleware\Admin;

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

Auth::routes();

//Route Admin   



Route::group(['middleware' => 'admin'],function(){


    Route::get('home', [AdminController::class, 'index'])->name('home');    
    Route::get('exp_excel', [AdminController::class, 'export_excel']);
    Route::get('exp_excel_ten', [AdminController::class, 'export_excel_ten']);
    Route::get('exp_excel_barang', [AdminController::class, 'export_items']);

    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('create', [CategoryController::class, 'create']);
        Route::post('create', [CategoryController::class, 'insert']);
        Route::get('edit/{id}', [CategoryController::class, 'edit']);
        Route::post('edit/{id}', [CategoryController::class, 'update']);
        Route::get('delete/{id}', [CategoryController::class, 'delete']);
    });

    Route::prefix('unit')->group(function(){
        Route::get('/', [UnitController::class, 'index']);
        Route::get('create', [UnitController::class, 'create']);
        Route::post('create', [UnitController::class, 'insert']);
        Route::get('edit/{id}', [UnitController::class, 'edit']);
        Route::post('edit/{id}', [UnitController::class, 'update']);
        Route::get('delete/{id}', [UnitController::class, 'delete']);
    });

    Route::prefix('items')->group(function(){
        Route::get('/', [ItemsController::class, 'index']);
        Route::get('create', [ItemsController::class, 'create']);
        Route::post('create', [ItemsController::class, 'insert']);
        Route::get('edit/{id}', [ItemsController::class, 'edit']);
        Route::post('edit/{id}', [ItemsController::class, 'update']);
        Route::get('delete/{id}', [ItemsController::class, 'delete']);
        Route::get('search', [ItemsController::class, 'search']);
    });

    Route::prefix('user')->group(function(){
        Route::get('/', [AdminController::class, 'all']);
        Route::get('create', [AdminController::class, 'add']);
        Route::post('tambah', [AdminController::class, 'tambah']);
        Route::get('edit/{id}', [AdminController::class, 'edit']);
        Route::post('edit/{id}', [AdminController::class, 'update']);
        Route::get('delete/{id}', [AdminController::class, 'delete']);
    });
});

Route::group(['middleware' => 'kasir'],function(){

    Route::get('kasir', [KasirController::class, 'index'])->name('kasir');

    Route::prefix('transaction')->group(function(){
        Route::get('/', [TransactionController::class, 'index']);
        Route::get('detail/{id}', [TransactionController::class, 'detail']);
        Route::get('nota/{id}', [TransactionController::class, 'nota']);
        Route::get('delete/{id}', [TransactionController::class, 'delete']);
    });

    Route::prefix('cart')->group(function(){
        Route::get('/', [CartController::class, 'index']);
        Route::get('insert', [TransactionController::class, 'insert']);
        Route::get('create', [CartController::class, 'create']);
        Route::post('create', [CartController::class, 'insert']);
        Route::get('edit/{id}', [CartController::class, 'edit']);
        Route::post('edit/{id}', [CartController::class, 'update']);
        Route::get('delete/{id}', [CartController::class, 'delete']);
        Route::get('details/{id}', [CartController::class, 'getDetails']);
        Route::get('getDetails/{id}', 'CartController@getDetails');
        Route::get('get/details/{id}', 'CartController@getDetails')->name('getDetails');
    });
});
