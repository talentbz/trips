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

Auth::routes();

//frontend
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.home');

// admin dashboard
Route::prefix('/admin')->middleware(['auth:web', 'Admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
    //Client section
    Route::resource('client', App\Http\Controllers\Admin\ClientController::class, ['as' => 'admin']);
    Route::resource('bus', App\Http\Controllers\Admin\BusController::class, ['as' => 'admin']);
    Route::prefix('/miscellaneous')->group(function () {
        Route::resource('city', App\Http\Controllers\Admin\CityController::class, ['as' => 'admin.miscellaneous']);
    });
});


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);