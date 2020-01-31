<?php

use App\Local\Sistema1;
use App\SistemaMenos1\Ticket;
use App\TipoServicio;
use Illuminate\Database\Seeder;

class Sistema_1Seeder extends Seeder
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
        Ticket::orderBy('Folio')->chunk(1000,function($registros)use($tipo_servicios){
        	foreach ($registros as $registro) {
        		$cadena = explode('_',$registro['Imagen1']);
    			$fecha = date('Y-m-d',strtotime($cadena[0]));
    			$hora = date('G:i:s',strtotime($cadena[1]));
    			$localsistema = new Sistema1([
    				'placa_original' => $registro->Placa,
    				'sistema'=>0, //Churubusco
    				'img_path_velocidad' => $registro['Imagen1'],
    				'img_path_placa' => $registro['Imagen2'],
					'fecha' => $fecha,
					'hora' => $hora,
					'velocidad' => $registro['Velocidad']
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
