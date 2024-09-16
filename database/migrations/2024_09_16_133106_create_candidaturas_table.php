<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('candidaturas', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_vaga')->references('id')->on('vagas')->onDelete('cascade');
			$table->foreignId('id_pessoa')->references('id')->on('pessoas')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('candidaturas');
	}
};
