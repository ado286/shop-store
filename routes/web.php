<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/cartadd', [CartController::class, 'store'])->name('addCart');


Route::middleware(['auth:sanctum', 'verified', 'admins'])->resource('/admin/product', ProductController::class);

Route::middleware(['admins'])->get('/admin', [ProductController::class, 'users']);
