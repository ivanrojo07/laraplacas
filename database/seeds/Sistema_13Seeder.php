<?php

use App\Local\Sistema13;
use App\Sistema_13\ImagenVelocidad;
use App\TipoServicio;
use Illuminate\Database\Seeder;

class Sistema_13Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipo_servicios = TipoServicio::get();
        ImagenVelocidad::where('img','like',"%_1.jpg%")->chunk(100,function($registros)use($tipo_servicios){
        	foreach ($registros as $registro) {
        		$cadena = explode('_',$registro->img);
        		$fecha = date('Y-m-d',strtotime($cadena[0]));
        		$hora = date('G:i:s',strtotime($cadena[1]));
        		$localsistema = new Sistema13([
        			'placa_original' => trim($registro->placa_original),
        			'placa_modificada' => ($registro->placa ? trim($registro->placa->placa_modificada) : ''),
        			'sistema' => 13, //Consulado
        			'img_path_velocidad' => trim($registro->img),
					'img_path_placa' => trim(str_replace('1.jpg','2.jpg',$registro->img)),
					'fecha' => $fecha,
					'hora' => $hora,
					'velocidad' => $registro->velocidad
        		]);
        		foreach ($tipo_servicios as $patron) {
					if(preg_grep($patron->expresion,[$localsistema->placa_original]) || preg_grep($patron->expresion,[$localsistema->placa_modificada])){
		            	// guardamos el tipo de servicio dado a una variable
		                $servicio = $patron;
		            }
				}
				if (isset($servicio)) {
					$localsistema['tipo_servicio_id'] = $servicio->id;
				}
				$localsistema->save();
        	}
        });
    }
}
