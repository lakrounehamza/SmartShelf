<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('profiles', API\ProfileController');
Route::get('clients', [ClientController::class ,'index']);
Route::get('clients/{client}', [ClientController::class ,'show']);
Route::delete('clients/{client}', [ClientController::class ,'destroy']);
Route::put('clients/{client}', [ClientController::class ,'update']);
Route::post('clients', [ClientController::class ,'store']);
// Route::post('clients', [ClientController::class ,'store']); 