<?php

use App\Local\Repuve;
use App\PlacaRepuve;
use Illuminate\Database\Seeder;

class RepuveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	PlacaRepuve::chunk(100,function($registros){
       		foreach ($registros as $registro) {
       			$repuve = new Repuve([
       				'placa' => trim($registro->placa),
			    	'marca' => trim($registro->marca),
			    	'modelo' => trim($registro->modelo),
			    	'anio' => trim($registro->año),
			    	'clase' => trim($registro->clase),
			    	'tipo' => trim($registro->tipo),
			    	'niv' => trim($registro->niv),
			    	'version' => trim($registro->version),
			    	'robado' => trim($registro->robado),
			    	'fecha' => $registro->fecha_actualizacion
       			]);
       			$repuve->save();
       		}
       	});
    }
}
