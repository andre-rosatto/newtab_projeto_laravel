<?php

namespace Database\Seeders;

use App\Models\Candidatura;
use App\Models\Pessoa;
use App\Models\Vaga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		Vaga::factory(100)->create();
		Pessoa::factory(50)->create();
		Candidatura::factory(500)->create();
	}
}
