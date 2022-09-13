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
    Route::post('bus/status', [App\Http\Controllers\Admin\BusController::class, 'status'])->name('admin.bus.status');
    Route::get('daily/table', [App\Http\Controllers\Admin\CommonController::class, 'setTableData'])->name('admin.daily.table');
    Route::resource('trip', App\Http\Controllers\Admin\TripController::class, ['as' => 'admin']);
    Route::post('trip/status', [App\Http\Controllers\Admin\TripController::class, 'status'])->name('admin.trip.status');
    Route::resource('trip_bus', App\Http\Controllers\Admin\TripsBusController::class, ['as' => 'admin']);
    Route::post('trip_bus/status', [App\Http\Controllers\Admin\TripsBusController::class, 'status'])->name('admin.trip_bus.status');
    Route::resource('daily_trip', App\Http\Controllers\Admin\DailyTripController::class, ['as' => 'admin']);
    Route::resource('maintenance', App\Http\Controllers\Admin\MaintenanceController::class, ['as' => 'admin']);
    Route::resource('driver', App\Http\Controllers\Admin\DriverController::class, ['as' => 'admin']);
    Route::post('driver/status', [App\Http\Controllers\Admin\DriverController::class, 'status'])->name('admin.driver.status');
    Route::resource('super_visor', App\Http\Controllers\Admin\SuperVisorController::class, ['as' => 'admin']);
    Route::post('super_visor/status', [App\Http\Controllers\Admin\SuperVisorController::class, 'status'])->name('admin.super_visor.status');
    Route::resource('user', App\Http\Controllers\Admin\UserController::class, ['as' => 'admin']);
    Route::post('user/status', [App\Http\Controllers\Admin\UserController::class, 'status'])->name('admin.user.status');

    Route::prefix('/miscellaneous')->group(function () {
        Route::resource('city', App\Http\Controllers\Admin\Miscellaneous\CityController::class, ['as' => 'admin.miscellaneous']);
        Route::post('city/status', [App\Http\Controllers\Admin\Miscellaneous\CityController::class, 'status'])->name('admin.miscellaneous.city.status');
        Route::resource('client_type', App\Http\Controllers\Admin\Miscellaneous\ClientTypeController::class, ['as' => 'admin.miscellaneous']);
        Route::post('client_type/status', [App\Http\Controllers\Admin\Miscellaneous\ClientTypeController::class, 'status'])->name('admin.miscellaneous.client_type.status');
        Route::resource('contract_type', App\Http\Controllers\Admin\Miscellaneous\ContractTypeController::class, ['as' => 'admin.miscellaneous']);
        Route::post('contract_type/status', [App\Http\Controllers\Admin\Miscellaneous\ContractTypeController::class, 'status'])->name('admin.miscellaneous.contract_type.status');
        Route::resource('bus_type', App\Http\Controllers\Admin\Miscellaneous\BusTypeController::class, ['as' => 'admin.miscellaneous']);
        Route::post('bus_type/status', [App\Http\Controllers\Admin\Miscellaneous\BusTypeController::class, 'status'])->name('admin.miscellaneous.bus_type.status');
        Route::resource('bus_model', App\Http\Controllers\Admin\Miscellaneous\BusModelController::class, ['as' => 'admin.miscellaneous']);
        Route::post('bus_model/status', [App\Http\Controllers\Admin\Miscellaneous\BusModelController::class, 'status'])->name('admin.miscellaneous.bus_model.status');
        Route::resource('bus_size', App\Http\Controllers\Admin\Miscellaneous\BusSizeController::class, ['as' => 'admin.miscellaneous']);
        Route::post('bus_size/status', [App\Http\Controllers\Admin\Miscellaneous\BusSizeController::class, 'status'])->name('admin.miscellaneous.bus_size.status');
        Route::resource('bus_maintenance', App\Http\Controllers\Admin\Miscellaneous\MaintenanceController::class, ['as' => 'admin.miscellaneous']);
        Route::post('bus_maintenance/status', [App\Http\Controllers\Admin\Miscellaneous\MaintenanceController::class, 'status'])->name('admin.miscellaneous.bus_maintenance.status');
        Route::resource('area', App\Http\Controllers\Admin\Miscellaneous\AreaController::class, ['as' => 'admin.miscellaneous']);
        Route::post('area/status', [App\Http\Controllers\Admin\Miscellaneous\AreaController::class, 'status'])->name('admin.miscellaneous.area.status');
    });

    Route::prefix('/reports')->group(function () {
        Route::resource('trips_client', App\Http\Controllers\Admin\Reports\TripsClientController::class, ['as' => 'admin.reports']);
        Route::resource('trips_bus', App\Http\Controllers\Admin\Reports\TripsBusController::class, ['as' => 'admin.reports']);
        Route::resource('trips_type', App\Http\Controllers\Admin\Reports\TripsTypeController::class, ['as' => 'admin.reports']);
        Route::resource('trips_driver', App\Http\Controllers\Admin\Reports\TripsDriverController::class, ['as' => 'admin.reports']);
        Route::resource('trips_bus_size', App\Http\Controllers\Admin\Reports\TripsBusSizeController::class, ['as' => 'admin.reports']);
        Route::resource('trips_client_type', App\Http\Controllers\Admin\Reports\TripsClientTypeController::class, ['as' => 'admin.reports']);
        Route::resource('trips_contract_type', App\Http\Controllers\Admin\Reports\TripsContractTypeController::class, ['as' => 'admin.reports']);
        Route::resource('trips_owership', App\Http\Controllers\Admin\Reports\TripsOwnerShipController::class, ['as' => 'admin.reports']);
    });
});


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);