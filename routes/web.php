<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/datasiswa',[DataSiswaController::class, 'index'])->name('datasiswa.index');

Route::prefix('datasiswa')->name('datasiswa.')->group(function(){
    Route::get('/create', [DataSiswaController::class, 'create'])->name('create');
    Route::post('/store',[DataSiswaController::class, 'store'])->name('store');
    Route::get('/{id}/edit',[DataSiswaController::class, 'edit'])->name('edit');
    Route::put('/{id}',[DataSiswaController::class, 'update'])->name('update');
    Route::delete('/{id}',[DataSiswaController::class, 'destroy'])->name('destroy');
});

Route::get('/user',[UserController::class, 'index'])->name('user.index');

Route::prefix('user')->name('user.')->group(function(){
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store',[UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit',[UserController::class, 'edit'])->name('edit');
    Route::put('/{id}',[UserController::class, 'update'])->name('update');
    Route::delete('/{id}',[UserController::class, 'destroy'])->name('destroy');
});
