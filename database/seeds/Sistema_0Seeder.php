<?php

use App\Local\Sistema0;
use App\Sistema_0\Reconocimiento;
use App\TipoServicio;
use Illuminate\Database\Seeder;

class Sistema_0Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$tipo_servicios = TipoServicio::get();
        Reconocimiento::orderBy('IDReconocimiento')->chunk(100,function($registros)use($tipo_servicios){
        	foreach ($registros as $registro) {
        		$cadena = explode('_',$registro['ImagenPlaca']);
    			$fecha = date('Y-m-d',strtotime($cadena[0]));
    			$hora = date('G:i:s',strtotime($cadena[1]));
        		$localsistema = new Sistema0([
        			'placa_original' => trim($registro['Placa']),
        			'sistema'=>0, //Sistema Churubusco
        			'img_path_velocidad' => $registro['ImagenVelocidad'],
					'img_path_placa' => $registro['ImagenPlaca'],
					'fecha' => $fecha,
					'hora' => $hora,
					'velocidad' => $registro['Velocidad'],
        		]);
				foreach ($tipo_servicios as $patron) {
					if(preg_grep($patron->expresion,[$localsistema->placa_original]) | preg_grep($patron->expresion,[$localsistema->placa_modificada])){
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
