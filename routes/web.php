<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RideController;
 
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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/cars', function () {
    return view('cars.index');
})->name('cars');
*/

Route::middleware(['auth:sanctum', 'verified'])->get('cars', [CarController::class, 'index'])->name('cars');
Route::middleware(['auth:sanctum', 'verified'])->get('add_car', [CarController::class, 'create'])->name('add_car');
Route::middleware(['auth:sanctum', 'verified'])->post('store_car', [CarController::class, 'store'])->name('store_car');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_car', [CarController::class, 'delete'])->name('delete_car');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_car', [CarController::class, 'edit'])->name('edit_car');
Route::middleware(['auth:sanctum', 'verified'])->post('update_car', [CarController::class, 'update'])->name('update_car');
Route::middleware(['auth:sanctum', 'verified'])->post('file_add', [CarController::class, 'file_add'])->name('file_add');
Route::middleware(['auth:sanctum', 'verified'])->post('process', [CarController::class, 'process'])->name('process');

Route::middleware(['auth:sanctum', 'verified'])->get('brands', [BrandController::class, 'index'])->name('brands');

Route::middleware(['auth:sanctum', 'verified'])->get('rides', [RideController::class, 'index'])->name('rides');