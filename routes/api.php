<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Auth

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

// Product

Route::get('/product', [ProductController::class, 'index'])
    ->middleware('auth:sanctum');

Route::post('/product', [ProductController::class, 'store'])
    ->middleware('auth:sanctum');

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->middleware('auth:sanctum');

Route::put('/product/{id}', [ProductController::class, 'update'])
    ->middleware('auth:sanctum');

Route::delete('/product/{id}', [ProductController::class, 'destroy'])
    ->middleware('auth:sanctum');

// Delivery

Route::get('/delivery', [DeliveryController::class, 'index'])
    ->middleware('auth:sanctum');

Route::post('/delivery', [DeliveryController::class, 'store'])
    ->middleware('auth:sanctum');

Route::get('/delivery/{id}', [DeliveryController::class, 'show'])
    ->middleware('auth:sanctum');
