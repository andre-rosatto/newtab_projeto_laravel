<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\Vaga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidatura>
 */
class CandidaturaFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'id_vaga' => Vaga::all()->random()->id,
			'id_pessoa' => Pessoa::all()->random()->id
		];
	}
}
