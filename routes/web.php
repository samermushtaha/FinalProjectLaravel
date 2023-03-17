<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard/store/create', [App\Http\Controllers\StoreController::class, 'create'])->middleware('auth');
Route::post('dashboard/store/store', [App\Http\Controllers\StoreController::class, 'store'])->middleware('auth');
Route::get('dashboard/store/index', [App\Http\Controllers\StoreController::class, 'index'])->middleware('auth');
Route::get('dashboard/store/{id}/edit', [App\Http\Controllers\StoreController::class, 'edit'])->middleware('auth');
Route::put('dashboard/store/{id}/update', [App\Http\Controllers\StoreController::class, 'update'])->middleware('auth');
Route::delete('dashboard/store/{id}/delete', [App\Http\Controllers\StoreController::class, 'destroy'])->middleware('auth');

Route::get('dashboard/product/create', [App\Http\Controllers\ProductController::class, 'create'])->middleware('auth');
Route::post('dashboard/product/store', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth');
Route::get('dashboard/product/index', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');
Route::get('dashboard/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth');
Route::put('dashboard/product/{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth');
Route::delete('dashboard/product/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth');

Route::post('dashboard/purchase_transactions/store', [App\Http\Controllers\PurchaseTransactionsController::class, 'store']);
Route::get('dashboard/purchase_transactions/index', [App\Http\Controllers\PurchaseTransactionsController::class, 'index'])->middleware('auth');
Route::get('dashboard/purchase_transactions/report', [App\Http\Controllers\PurchaseTransactionsController::class, 'report'])->middleware('auth');

Route::get('public/home', [App\Http\Controllers\PublicController::class, 'getLimitStores']);
Route::get('public/store', [App\Http\Controllers\PublicController::class, 'getStores']);
Route::get('public/store/{id}', [App\Http\Controllers\PublicController::class, 'getStoreProducts']);
Route::get('public/product', [App\Http\Controllers\PublicController::class, 'getProducts']);
Route::get('public/product/search', [App\Http\Controllers\PublicController::class, 'search']);
Route::get('public/product/{id}', [App\Http\Controllers\PublicController::class, 'getSingleProduct']);
