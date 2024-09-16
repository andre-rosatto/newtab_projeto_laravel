<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
	public function index()
	{
		return response()->json([
			'vagas' => Vaga::all()
		], 200);
	}

	public function store(Request $request)
	{
		// validação
		$validation = validator($request->all(), [
			'empresa' => ['required', 'max:255'],
			'titulo' => ['required', 'max:255'],
			'descricao' => ['required', 'min:10'],
			'localizacao' => ['required', 'in:A,B,C,D,E,F'],
			'nivel' => ['required', 'integer', 'between:1,5']
		]);

		if ($validation->fails()) {
			// dados inválidos
			return response()->json([
				'success' => false
			], 400);
		} else {
			// dados válidos
			$vaga = new Vaga();
			$vaga->empresa = $request->empresa;
			$vaga->titulo = $request->titulo;
			$vaga->descricao = $request->descricao;
			$vaga->localizacao = $request->localizacao;
			$vaga->nivel = intval($request->nivel);
			$vaga->save();

			return response()->json([
				'success' => true,
				'vaga' => $vaga
			], 200);
		}
	}
}
