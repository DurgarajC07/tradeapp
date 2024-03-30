<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\OrderController;
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

// trade routes
Route::get('/trade', [TradeController::class, 'index'])->name('trade.index');
Route::post('/trade', [TradeController::class, 'store'])->name('trade.store');
Route::get('/trade/{id}/edit', [TradeController::class, 'edit'])->name('trade.edit');
Route::put('/trade/{id}', [TradeController::class, 'update'])->name('trade.update');
Route::delete('/trade/{id}', [TradeController::class, 'destroy'])->name('trade.destroy');

// order routes
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/{id}/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::post('/order/{id}', [OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

Route::get('/', function () {
    return view('welcome');
});
