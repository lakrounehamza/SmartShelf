<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RayonController;
use App\Http\Controllers\API\ProduitController;
use App\Http\Controllers\API\VonderController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('profiles', API\ProfileController');
Route::apiResource('clients', ClientController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('rayons',RayonController::class);
Route::apiResource('vonders',VonderController::class);
Route::apiResource('produits', ProduitController::class);


// Route::get('clients/{client}', [ClientController::class ,'show']);
// Route::delete('clients/{client}', [ClientController::class ,'destroy']);
// Route::put('clients/{client}', [ClientController::class ,'update']);
// Route::post('clients', [ClientController::class ,'store']);
// Route::post('clients', [ClientController::class ,'store']); 