<?php

use App\Local\Sistema44;
use App\TipoServicio;
use Illuminate\Database\Seeder;

class Sistema0TipoServicioSeeder extends Seeder
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
        Sistema44::orderBy('id','ASC')->chunk(250,function($registros)use($tipo_servicios){
        	foreach ($registros as $registro) {
        		foreach ($tipo_servicios as $tipo) {
    				if(preg_match($tipo->expresion,$registro->placa_original) || $registro->placa_modificada !== "0" & preg_match($tipo->expresion,$registro->placa_modificada)){
		            	// guardamos el tipo de servicio dado a una variable
		                $servicio = $tipo;
		            }
        		}
        		if (strpos($registro->placa_original, '$') !== false && $registro->placa_modificada === "0") {
        			$registro->tipo_servicio_id = null;
        			$registro->save();
        		}
        		elseif (isset($servicio)) {
        			// $this->command->info('si tiene servicio');
        			$registro->tipo_servicio_id = $servicio->id;
        			$registro->save();
        		}
        		else{
        			// $this->command->info('no tiene servicio');
        			$registro->tipo_servicio_id = null;
        			$registro->save();
        		}
        	}
        });
    }
}
