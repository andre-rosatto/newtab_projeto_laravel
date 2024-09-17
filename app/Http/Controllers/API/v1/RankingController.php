<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Vaga;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
	public function rank($id)
	{
		$vaga = Vaga::find($id);
		$score = $this->getScore($vaga);
		return response()->json($score, 200);
	}

	private function getScore($vaga)
	{
		$sql = "
					WITH RECURSIVE cte AS (
				SELECT
					paths.destination,
					paths.distance AS dist,
					CAST(CONCAT(paths.src, paths.destination) AS CHAR(255)) AS path
						FROM paths
						WHERE paths.src = '$vaga->localizacao'
				UNION ALL
				SELECT
					paths.destination,
					cte.dist + paths.distance AS dist,
					CONCAT(cte.path, paths.destination) AS path
						FROM cte
						INNER JOIN paths ON paths.src = cte.destination
						WHERE cte.destination != 'F' AND NOT INSTR(cte.path, paths.destination)
			)

			SELECT
				pessoas.nome,
				pessoas.profissao,
				pessoas.localizacao,
				pessoas.nivel,
				((100 - 25 * ABS(vagas.nivel - pessoas.nivel)) + (100 - 25 * GREATEST(FLOOR((MIN(dist) - 1) DIV 5), 0))) DIV 2 AS score
			FROM candidaturas
			INNER JOIN vagas ON vagas.id = candidaturas.id_vaga
			INNER JOIN pessoas ON pessoas.id = candidaturas.id_pessoa
			INNER JOIN cte ON cte.destination = pessoas.localizacao
			WHERE candidaturas.id_vaga = $vaga->id
			GROUP BY pessoas.nome, vagas.nivel, pessoas.nivel, pessoas.profissao, pessoas.localizacao
			ORDER BY score DESC;
			";
		$result = DB::select($sql);
		return $result;
	}
}
