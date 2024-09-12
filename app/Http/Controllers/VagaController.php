<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VagaController extends Controller
{
	public function store(Request $request)
	{
		// $fields = $request->validate([
		// 	'empresa' => 'required|max:255',
		// 	'titulo' => 'required|max:255',
		// 	'descricao' => 'required|min:10',
		// 	'localizacao' => 'required',
		// 	'nivel' => 'required'
		// ]);
		dd($request);
	}
}
