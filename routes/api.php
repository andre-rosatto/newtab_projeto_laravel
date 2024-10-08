<?php

use App\Http\Controllers\API\v1\CandidaturaController;
use App\Http\Controllers\API\v1\VagaController;
use App\Http\Controllers\API\v1\PessoaController;
use App\Http\Controllers\API\v1\RankingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
	// vagas
	Route::get('/vagas', [VagaController::class, 'index']);
	Route::post('/vagas', [VagaController::class, 'store']);

	// pessoas
	Route::get('/pessoas', [PessoaController::class, 'index']);
	Route::post('/pessoas', [PessoaController::class, 'store']);

	// candidaturas
	Route::get('/candidaturas', [CandidaturaController::class, 'index']);
	Route::post('/candidaturas', [CandidaturaController::class, 'store']);

	// ranking
	Route::get('/vagas/{id}/candidaturas/ranking', [RankingController::class, 'rank']);
});

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:sanctum');
