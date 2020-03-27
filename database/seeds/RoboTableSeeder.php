<?php

use App\Local\Robo;
use App\RoboRepuve;
use Illuminate\Database\Seeder;

class RoboTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RoboRepuve::chunk(100,function($registros){
        	foreach ($registros as $registro) {
        		$robo = new Robo([
        			'placa' => trim($registro->placa),
			    	'status' => trim($registro->status),
			    	'entidad' => trim($registro->entidad),
			    	'fecha_actualizacion' => $registro->fecha_actualizacion,
			    	'fecha_robo' => $registro->fecha_robo,
			    	'fecha_averiguacion' => $registro->fecha_averiguacion,
			    	'entidad_recuperacion' => trim($registro->entidad_recuperacion),
			    	'fecha_recuperacion' => $registro->fecha_recuperacion
        		]);
        		$robo->save();
        	}
        });
    }
}
