<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
	public function index()
	{
		return response()->json([
			'pessoas' => Pessoa::all()
		], 200);
	}

	public function store(Request $request)
	{
		// validação
		$validation = validator($request->all(), [
			'nome' => ['required', 'max:255'],
			'profissao' => ['required', 'max:255'],
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
			$pessoa = new Pessoa();
			$pessoa->nome = $request->nome;
			$pessoa->profissao = $request->profissao;
			$pessoa->localizacao = $request->localizacao;
			$pessoa->nivel = intval($request->nivel);
			$pessoa->save();

			return response()->json([
				'success' => true,
				'pessoa' => $pessoa
			], 200);
		}
	}
}
