<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PractitionerController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes(
    [
        'register' => false,
    ]
);

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('layouts.dashboard.index');
    })->name('dashboard');

    //clients
    Route::resource('/clients', ClientController::class);
    Route::resource('/practitioners', PractitionerController::class);
    Route::resource('/appointments', AppointmentController::class);
    Route::resource('/treatments', TreatmentController::class);
    Route::resource('/payments', PaymentController::class);
    Route::get('/get-appointments-by-client', [PaymentController::class, 'getAppointmentsByClient'])
    ->name('get.appointments.by.client');
    Route::resource('/inventories', InventoryController::class);
});
