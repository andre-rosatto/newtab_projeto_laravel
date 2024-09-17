<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use App\Models\User;
use App\Models\Vaga;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		Vaga::factory(100)->create();
		Pessoa::factory(100)->create();

		// User::factory(10)->create();

		// User::factory()->create([
		//     'name' => 'Test User',
		//     'email' => 'test@example.com',
		// ]);
	}
}
