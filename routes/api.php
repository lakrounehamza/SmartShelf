<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RayonController;
use App\Http\Controllers\API\ProduitController;
use App\Http\Controllers\API\VonderController;
use App\Http\Controllers\API\UserAuthController; 

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('profiles', API\ProfileController');
Route::apiResource('clients', ClientController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('rayons',RayonController::class);
Route::apiResource('vonders',VonderController::class);
Route::apiResource('produits', ProduitController::class);
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('rayons',RayonController::class);
    Route::apiResource('vonders',VonderController::class);
    Route::apiResource('produits', ProduitController::class);
});
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('rayons/{titre}/produits', [ProduitController::class, 'consuler']);
    Route::get('rayons/{titre}/produits/{nom}', [ProduitController::class, 'search']);
});
Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])->middleware('auth:sanctum');