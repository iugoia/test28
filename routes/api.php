<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('models')->group(function () {
    Route::get('', [\App\Http\Controllers\ModelController::class, 'index']);
});

Route::prefix('brands')->group(function () {
    Route::get('', [\App\Http\Controllers\BrandController::class, 'index']);
});

Route::apiResource('cars', \App\Http\Controllers\CarController::class);
