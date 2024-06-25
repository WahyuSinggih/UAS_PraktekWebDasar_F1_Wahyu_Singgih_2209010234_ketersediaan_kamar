<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ReservasiController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('kamar', KamarController::class);
Route::resource('tipe_kamar', TipeKamarController::class);
Route::resource('pasien', PasienController::class);
Route::resource('reservasi', ReservasiController::class);
Route::post('reservasi/{reservasi}/check-out', [ReservasiController::class, 'checkOut'])->name('reservasi.check-out');
Route::post('reservasi/{id}/check-in', [ReservasiController::class, 'checkIn'])->name('reservasi.check-in');
