<?php

use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(ReservasController::class)->group(function(){
    Route::get('/reservas/{hotel_id}','index' )->name('reserva.index');
    Route::get('/','index')->name('hotel.index');
    Route::get('/modulos/reservas/creater/{hotel_id}','create')->name('reserva.create');
    Route::post('/modulos/reservas','store')->name('reserva.store');
    Route::get('/modulos/reservas/editar/{reserva_id}','edit')->name('reserva.edit');
    //Route::get('/modulos/reservas/{reserva_id}/editarr','edit')->name('reserva.edit');
    Route::put('/modulos/reservas/{hotel}','update')->name('reserva.update');
});

Route::controller(HotelController::class)->group(function(){
Route::get('/','index')->name('hotel.index');
Route::post('/modulos/hoteles','store')->name('hotel.store');
Route::get('/modulos/hoteles/create','create')->name('hotel.create');
Route::get('/modulos/hoteles/{hotel}/editar','edit')->name('hotel.edit');
Route::put('/modulos/hoteles/{hotel}','update')->name('hotel.update');
Route::delete('/modulos/hoteles/{hotel}','destroy')->name('hotel.destroy');
});
Route::controller(HabitacionesController::class)->group(function(){
    Route::get('/modulos/modhabi','indexh')->name('habitacion.index');
    Route::post('/modulos/modhabi','storeh')->name('habitacion.store');
    Route::get('/modulos/modhabi/createh','createh')->name('habitacion.create');
    Route::get('/modulos/modhabi/{habitaciones}/editarh','edith')->name('habitacion.edit');
    Route::put('/modulos/modhabi/{habitaciones}','updateh')->name('habitacion.update');
    Route::delete('/modulos/modhabi/{habitaciones}','destroyh')->name('habitacion.destroy');

    });
    

require __DIR__.'/auth.php';