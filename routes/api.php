<?php

use App\Http\Controllers\API\v1\VagaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
	Route::get('/vagas', [VagaController::class, 'index']);
	Route::post('/vagas', [VagaController::class, 'store']);
});

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:sanctum');
