<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Candidatura;
use Illuminate\Http\Request;

class CandidaturaController extends Controller
{
	public function index()
	{
		return response()->json([
			'candidaturas' => Candidatura::all()
		], 200);
	}

	public function store(Request $request)
	{
		// validação
		$validation = validator($request->all(), [
			'id_vaga' => ['required', 'exists:vagas,id'],
			'id_pessoa' => ['required', 'exists:pessoas,id']
		]);

		if ($validation->fails()) {
			// dados inválidos
			return response()->json([
				'success' => false
			], 400);
		} else {
			// dados válidos
			$candidatura = new Candidatura();
			$candidatura->id_vaga = $request->id_vaga;
			$candidatura->id_pessoa = $request->id_pessoa;
			$candidatura->save();

			return response()->json([
				'success' => true,
				'candidatura' => $candidatura
			], 200);
		}
	}
}
