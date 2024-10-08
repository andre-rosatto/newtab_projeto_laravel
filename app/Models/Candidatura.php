<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
	use HasFactory;

	protected $table = 'candidaturas';

	protected $fillable = [
		'id_vaga',
		'id_pessoa'
	];
}
