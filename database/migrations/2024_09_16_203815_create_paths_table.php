<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('paths', function (Blueprint $table) {
			$table->id();
			$table->enum('src', ['A', 'B', 'C', 'D', 'E', 'F']);
			$table->enum('destination', ['A', 'B', 'C', 'D', 'E', 'F']);
			$table->tinyInteger('distance');
		});

		DB::table('paths')->insert(['src' => 'A', 'destination' => 'A', 'distance' => 0]);
		DB::table('paths')->insert(['src' => 'A', 'destination' => 'B', 'distance' => 5]);

		DB::table('paths')->insert(['src' => 'B', 'destination' => 'A', 'distance' => 5]);
		DB::table('paths')->insert(['src' => 'B', 'destination' => 'B', 'distance' => 0]);
		DB::table('paths')->insert(['src' => 'B', 'destination' => 'C', 'distance' => 7]);
		DB::table('paths')->insert(['src' => 'B', 'destination' => 'D', 'distance' => 3]);

		DB::table('paths')->insert(['src' => 'C', 'destination' => 'B', 'distance' => 7]);
		DB::table('paths')->insert(['src' => 'C', 'destination' => 'C', 'distance' => 0]);
		DB::table('paths')->insert(['src' => 'C', 'destination' => 'E', 'distance' => 4]);

		DB::table('paths')->insert(['src' => 'D', 'destination' => 'B', 'distance' => 3]);
		DB::table('paths')->insert(['src' => 'D', 'destination' => 'D', 'distance' => 0]);
		DB::table('paths')->insert(['src' => 'D', 'destination' => 'E', 'distance' => 10]);
		DB::table('paths')->insert(['src' => 'D', 'destination' => 'F', 'distance' => 8]);

		DB::table('paths')->insert(['src' => 'E', 'destination' => 'C', 'distance' => 4]);
		DB::table('paths')->insert(['src' => 'E', 'destination' => 'D', 'distance' => 10]);
		DB::table('paths')->insert(['src' => 'E', 'destination' => 'E', 'distance' => 0]);

		DB::table('paths')->insert(['src' => 'F', 'destination' => 'D', 'distance' => 8]);
		DB::table('paths')->insert(['src' => 'F', 'destination' => 'F', 'distance' => 0]);
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('paths');
	}
};
