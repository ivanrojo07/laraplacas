<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CamarasUbicacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('camaras_ubicacions')->insert([

        	/*********************
        	 *
        	 *	CIUDAD DE MÉXICO
        	 *
        	 *********************/
        	[
        		'sistema'          => 11,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 1,
				'ubicacion'        => 'Viaducto Miguel Alemán  y Av. Patriotismo',
				'referencia'       => 'Patriotismo',
				'limite_velocidad' => 80,
				'lat'              => '19.3999438875',
				'long'             => ' -99.1821650728',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 13,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 1,
				'ubicacion'        => 'Circuito Interior Oriente (Av. Rio Consulado) y Tanger',
				'referencia'       => 'Consulado',
				'limite_velocidad' => 80,
				'lat'              => '19.4483944',
				'long'             => '-99.089825',
				'carriles'         => 3
        	],
        	
        	[
        		'sistema'          => 14,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Insurgentes Sur (Ciudad Universitaria)',
				'referencia'       => 'Ciudad Universitaria',
				'limite_velocidad' => 80,
				'lat'              => '19.3235547065',
				'long'             => ' -99.1883548213',
				'carriles'         => 2
        	],
        	[
        		'sistema'          => 15,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 1,
				'ubicacion'        => 'Circuito Interior Poniente (Av. Rio Consulado) y Chelines',
				'referencia'       => 'Soriana',
				'limite_velocidad' => 80,
				'lat'              => '19.449906',
				'long'             => ' -99.100584',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 16,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Av. Tlalpan Sur y Museo (Xotepingo)',
				'referencia'       => 'Xotepingo',
				'limite_velocidad' => 80,
				'lat'              => '19.3277380768',
				'long'             => ' -99.1395537984',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 17,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Av. Tlalpan Norte y  Xotepingo',
				'referencia'       => 'Xotepingo',
				'limite_velocidad' => 80,
				'lat'              => '19.3278119343',
				'long'             => ' -99.1391607819',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 18,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Av. Tlalpan Norte y Los Atletas (General Anaya)',
				'referencia'       => 'General Anaya',
				'limite_velocidad' => 80,
				'lat'              => '19.3549284304',
				'long'             => ' -99.1442323233',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 19,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Viaducto Miguel Alemán  y Dr. Andrade',
				'referencia'       => 'Fonda Argentina',
				'limite_velocidad' => 80,
				'lat'              => '19.4038248',
				'long'             => ' -99.14861710000002',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 21,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Viaducto Rio de la Piedad  y Eje 3 (Azúcar)',
				'referencia'       => 'Eje 3',
				'limite_velocidad' => 80,
				'lat'              => '19.4055115734',
				'long'             => ' -99.1148592789',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 22,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Av. Tlalpan Sur y Dakota',
				'referencia'       => 'Dakota',
				'limite_velocidad' => 80,
				'lat'              => '19.3484623468',
				'long'             => ' -99.1455011679',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 43,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Periférico Sur  y Las Flores',
				'referencia'       => 'Las Flores',
				'limite_velocidad' => 80,
				'lat'              => '19.3576985776',
				'long'             => ' -99.1957073998',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 44,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Periferico Norte y Las Flores',
				'referencia'       => 'Las Flores',
				'limite_velocidad' => 80,
				'lat'              => '19.3575529946',
				'long'             => ' -99.195605478',
				'carriles'         => 3
        	],
        	[
        		'sistema'          => 0,
				'fecha_registro'   => '2014-2015',
				'verificada'       => 0,
				'ubicacion'        => 'Circuito Interior (Av. Rio Churubusco) y Ex Hacienda de Guadalupe',
				'referencia'       => 'Churubusco',
				'limite_velocidad' => 80,
				'lat'              => '19.362167',
				'long'             => ' -99.128919',
				'carriles'         => 3
        	],


        	/**************
        	 *
        	 *	MONTERREY
        	 *
        	 **************/

    //     	[
    //     		'sistema'          => 15,
				// 'fecha_registro'   => '2014-2015',
				// 'verificada'       => 0,
				// 'ubicacion'        => 'Monterrey 1',
				// 'referencia'       => 'Antonio L. Rodriguez',
				// 'limite_velocidad' => 60,
				// 'lat'              => '25.671959',
				// 'long'             => '-100.388487',
				// 'carriles'         => 3
    //     	],
    //     	[
    //     		'sistema'          => 37,
				// 'fecha_registro'   => '2014-2015',
				// 'verificada'       => 0,
				// 'ubicacion'        => 'Monterrey 2',
				// 'referencia'       => 'Constitución y Cerro Picacho',
				// 'limite_velocidad' => 80,
				// 'lat'              => '25.670189',
				// 'long'             => '-100.344345',
				// 'carriles'         => 4
    //     	],
    //     	[
    //     		'sistema'          => 39,
				// 'fecha_registro'   => '2014-2015',
				// 'verificada'       => 0,
				// 'ubicacion'        => 'Monterrey 3',
				// 'referencia'       => 'Eugenio Garza Sada y Camino al Diente',
				// 'limite_velocidad' => 80,
				// 'lat'              => '25.618115',
				// 'long'             => '-100.270766',
				// 'carriles'         => 4
    //     	],
    //     	[
    //     		'sistema'          => 40,
				// 'fecha_registro'   => '2014-2015',
				// 'verificada'       => 0,
				// 'ubicacion'        => 'Monterrey 4',
				// 'referencia'       => 'Lázaro Cárdenas y Paseo del Naranjo',
				// 'limite_velocidad' => 80,
				// 'lat'              => '25.633234',
				// 'long'             => '-100.304331',
				// 'carriles'         => 3
    //     	],
    //     	[
    //     		'sistema'          => 50,
				// 'fecha_registro'   => '2014-2015',
				// 'verificada'       => 0,
				// 'ubicacion'        => 'Monterrey 5',
				// 'referencia'       => 'Eugenio Garza Sada y Paseo San Francisco',
				// 'limite_velocidad' => 80,
				// 'lat'              => '25.6006972',
				// 'long'             => '-100.2656361111111',
				// 'carriles'         => 3
    //     	],
        ]);
    }
}
