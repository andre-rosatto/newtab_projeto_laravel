<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'nome' => fake()->name(),
			'profissao' => fake()->jobTitle(),
			'localizacao' => fake()->randomElement(['A', 'B', 'C', 'D', 'E', 'F']),
			'nivel' => fake()->randomElement([1, 2, 3, 4, 5])
		];
	}
}
