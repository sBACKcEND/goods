<?php

use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

Route::middleware('auth')->group(function () {
    Route::resource('warehouses', WarehouseController::class);
    Route::resource('products', ProductController::class);
});

Route::get('warehouses/{id}/products',[ProductController::class, 'warehouseProducts'])->name('warehouseProducts');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


