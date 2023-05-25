<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceOrderController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('service-orders', [ServiceOrderController::class, 'store']);
Route::get('service-orders', [ServiceOrderController::class, 'index']);
