<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkemaSertifikasiController;
use App\Http\Controllers\PesertaController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('skema', SkemaSertifikasiController::class);

   Route::resource('peserta', PesertaController::class)
    ->parameters([
        'peserta' => 'peserta',
    ]);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');