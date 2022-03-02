<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
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
    return view('home');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index');
    Route::get('/products/{product}', 'show');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('categories/{category}');
});

Route::controller(ContactController::class)->group(function() {
    Route::get('contact', 'index');
});


Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index');
});

Route::controller(AdminProductController::class)->group(function() {
    Route::get('/admin/index', 'index');
    Route::get('/admin/create', 'create');
    Route::post('/admin/create', 'store');
    Route::get('/admin/products', 'show');
    Route::get('/admin/edit', 'edit');
    Route::put('/admin/{product}', 'update');
    Route::put('/admin/{product}', 'destroy');
});
