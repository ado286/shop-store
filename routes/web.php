<?php

use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
Route::get('/cartupdate/{id}', [CartController::class, 'update'])->name('addupdate');
Route::get('/cartremove/{id}', [CartController::class, 'destroy'])->name('addremove');


Route::middleware(['auth:sanctum', 'verified', 'admins'])->resource('/admin/product', ProductController::class);

Route::middleware(['admins'])->resource('/admin', AdminRoleController::class);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/user/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*Auth::routes(['verify'=> true]);*/
