<?php

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


Route::middleware(['auth', 'admin' ])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\ProductsController::class, 'adminIndex']);
    Route::get('/admin/{id}', [\App\Http\Controllers\ProductsController::class, 'adminShow']);
    Route::put('/admin/{id}',[\App\Http\Controllers\ProductsController::class, 'delete']);
    
    Route::get('/admin/profile/{id}',[\App\Http\Controllers\ProductsController::class, 'adminUserProfile']);
    Route::put('/admin/profile/{id}',[\App\Http\Controllers\ProductsController::class, 'deleteUser']);

});

Route::middleware(['auth','notblocked'])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProductsController::class, 'Authprofile']);
    Route::get('/profile/{id}', [\App\Http\Controllers\ProductsController::class, 'profile']);
    

    Route::get('/products/create', [App\Http\Controllers\ProductsController::class,'create']);
    Route::post('/products', [App\Http\Controllers\ProductsController::class,'store']);

    Route::get('/accept/{id}', [\App\Http\Controllers\ProductsController::class, 'accept']);
    Route::post('/accept/{id}', [\App\Http\Controllers\ProductsController::class, 'accepteren']);

    Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'index']);
    Route::get('/products/{productId}', [\App\Http\Controllers\ProductsController::class, 'show']);
    Route::put('/products/{id}', [\App\Http\Controllers\ProductsController::class, 'lening']);
    Route::get('/', [\App\Http\Controllers\ProductsController::class, 'index']);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

