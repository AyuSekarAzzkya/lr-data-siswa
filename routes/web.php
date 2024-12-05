<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['IsGuest'])->group(function() {
    Route::get('/', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'loginauth'])->name('login.auth');
});

Route::middleware('IsLogin')->group(function() {
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['IsAdmin'])->group(function() {
        Route::get('/user',[UserController::class, 'index'])->name('user.index');
        Route::prefix('user')->name('user.')->group(function(){
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store',[UserController::class, 'store'])->name('store');
            Route::get('/{id}/edit',[UserController::class, 'edit'])->name('edit');
            Route::put('/{id}',[UserController::class, 'update'])->name('update');
            Route::delete('/{id}',[UserController::class, 'destroy'])->name('destroy');
        });
    });
    
    Route::middleware(['IsUser'])->group(function(){

        Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
        Route::prefix('absensi')->name('absensi.')->group(function(){
            Route::get('/create', [AbsensiController::class, 'create'])->name('create');
            Route::post('/store',[AbsensiController::class, 'store'])->name('store');
            Route::get('/{id}/edit',[AbsensiController::class, 'edit'])->name('edit');
            Route::put('/{id}',[AbsensiController::class, 'update'])->name('update');
            Route::delete('/{id}',[AbsensiController::class, 'destroy'])->name('destroy');
        });

        Route::get('/datasiswa',[DataSiswaController::class, 'index'])->name('datasiswa.index');
        Route::prefix('datasiswa')->name('datasiswa.')->group(function(){
            Route::get('/create', [DataSiswaController::class, 'create'])->name('create');
            Route::post('/store',[DataSiswaController::class, 'store'])->name('store');
            Route::get('/{id}/edit',[DataSiswaController::class, 'edit'])->name('edit');
            Route::put('/{id}',[DataSiswaController::class, 'update'])->name('update');
            Route::delete('/{id}',[DataSiswaController::class, 'destroy'])->name('destroy');
        });
    });   
});