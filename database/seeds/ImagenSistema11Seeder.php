<?php

use App\Local\ImagenSistema11;
use App\Local\Sistema11;
use App\Sistema_11\ImagenVelocidad;
use Illuminate\Database\Seeder;

class ImagenSistema11Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sistema11::orderBy('id','ASC')->chunk(100,function($registros){
        	foreach ($registros as $registro) {
        		if(!$registro->imagen){
        			$img_1 = $registro->img_path_velocidad;
        			$img_2 = $registro->img_path_placa;
        			$registro_1 = ImagenVelocidad::where('img','LIKE','%'.$img_1.'%')->first();
        			$registro_2 = ImagenVelocidad::where('img','LIKE','%'.$img_2.'%')->first();
        			$imagen_sistema11 = new ImagenSistema11;
        			if ($registro_1) {
        				$imagen_sistema11->img_1 = $registro_1->imgB64;
        			}
        			if($registro_2){
        				$imagen_sistema11->img_2 = $registro_2->imgB64;
        			}
        			$registro->imagen()->save($imagen_sistema11);
                    $this->command->info('registro '.$imagen_sistema11->id);
        		}
        	}
        });
    }
}
