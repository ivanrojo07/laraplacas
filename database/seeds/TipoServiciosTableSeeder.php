<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_servicios')->insert([
            /*************************************************************
             *
             *  NORMA Oficial Mexicana NOM-001-SCT-2-2016
             *
             *************************************************************/
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Unidad Motrices y Remolques',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(\d{1})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => '00-AA-0A',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Transfronterizo de carga',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(\d{1})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => '00-AA-0A',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Transfronterizo de pasaje',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{3})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'A-000-AA',
        		'longitud'      => 6
        	],
            [
                'tipo_servicio' => 'Autotransporte Federal',
                'modalidad'     => 'Unidad Motrices Y Remolques',
                'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(\d{1})([A-H,J-N,P-Z]{1})$/',
                'caracteres'    => '00-AA-0A',
                'longitud'      => 6
            ],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Pasaje Economico y Mixto',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{4})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'A-0000-A',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Traslado Nacional Vehiculo',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{1})(\d{1})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => '00-A0-AA',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Translado Nacional Motocicletas',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{3})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'AA000A',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Paquetería y Mensajeria',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{1})(\d{1})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => '00A-0AA',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Capacidad diferentes',
        		'expresion'     => '/^(\d{3})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => '000-A',
        		'longitud'      => 4
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Vehículo de diagnostico',
        		'expresion'     => '/^([A-H,J-N,P-Z]{3})(\d{3})$/',
        		'caracteres'    => 'AA-A000',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Convertidor',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{5})$/',
        		'caracteres'    => 'A-00-000',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Inspección de Vias Generales de Comunicación Federal',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{2})$/',
        		'caracteres'    => 'AA-00',
        		'longitud'      => 4
        	],
        	[
        		'tipo_servicio' => 'Autotransporte Federal',
        		'modalidad'     => 'Gruas de Arrastre, Salvamento e Industriales',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(\d{1})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => '00-AA-0A',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Fronterizo',
        		'modalidad'     => 'Automoviles',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{2})([A-H,J-N,P-Z]{3})(\d{1})$/',
        		'caracteres'    => 'A00AAA0',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Fronterizo',
        		'modalidad'     => 'Camiones, Autobuses y Remolques',
        		'expresion'     => '/^([A-H,J-N,P-Z]{3})(\d{3})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'AAA-000-A',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Publico Local',
        		'modalidad'     => 'Automoviles, Camiones, Autobuses y Remolques',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{3})([A-H,J-N,P-Z]{3})$/',
        		'caracteres'    => 'A-000-AAA',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Corporaciones Policiacas y de Vigilancia',
        		'modalidad'     => 'Patrullas de todo tipo de vehiculos',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{3})([A-H,J-N,P-Z]{1})(\d{1})$/',
        		'caracteres'    => 'AA-000A-0',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Corporaciones Policiacas y de Vigilancia',
        		'modalidad'     => 'Patrullas de todo tipo de motocicletas',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{2})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'AA00A',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Policía Federal',
        		'modalidad'     => 'Patrullas de todo tipo de vehiculos',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{4})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'AA-0000-A',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado',
        		'modalidad'     => 'Demostración Vehiculos',
        		'expresion'     => '/^(DM)([A-H,J-N,P-Z]{2})(\d{1})$/',
        		'caracteres'    => 'DM-AA-0',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado',
        		'modalidad'     => 'Demostración Entidades Federativas Vehiculos',
        		'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{2})(\d{2})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => '0-AA-00A',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado CDMX',
        		'modalidad'     => 'Automoviles',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{2})([A-H,J-N,P-Z]{3})$/',
        		'caracteres'    => 'A00-AAA',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado CDMX',
        		'modalidad'     => 'Camiones',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{3})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'A-000-AA',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado CDMX',
        		'modalidad'     => 'Autobuses',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(1)$/',
        		'caracteres'    => '00-AA-1',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado CDMX',
        		'modalidad'     => 'Remolques',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{1})([A-H,J-N,P-Z]{1})(\d{2})$/',
        		'caracteres'    => 'A-0A-00',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado CDMX',
        		'modalidad'     => 'Convertidor (Dolly)',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{5})$/',
        		'caracteres'    => 'A-00000',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Entidades Federativas',
        		'modalidad'     => 'Automoviles',
        		'expresion'     => '/^([A-H,J-N,P-Z]{3})(\d{3})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'AAA-000-A',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Entidades Federativas',
        		'modalidad'     => 'Camiones',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{4})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'AA-0000-A',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Entidades Federativas',
        		'modalidad'     => 'Autobuses',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{3})(\d{2})$/',
        		'caracteres'    => '00-AAA-00',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Entidades Federativas',
        		'modalidad'     => 'Remolques',
        		'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{2})(\d{3})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => '0AA-000-A',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Entidades Federativas',
        		'modalidad'     => 'Convertidor (Dolly)',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{5})$/',
        		'caracteres'    => 'A-00000',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Publico Local CDMX',
        		'modalidad'     => 'Alibre y sitio',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{4})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'A-0000-A',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Publico Local CDMX',
        		'modalidad'     => 'Con itinerario fijo',
        		'expresion'     => '/^(\d{3})([A-H,J-N,P-Z]{1})(\d{3})$/',
        		'caracteres'    => '000-A-000',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Publico Local CDMX',
        		'modalidad'     => 'Autobuses, Camiones y Remolques',
        		'expresion'     => '/^(\d{6})$/',
        		'caracteres'    => '000-000',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Publico Local Entidades Federativas',
        		'modalidad'     => 'Automoviles',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{3})([A-H,J-N,P-Z]{3})$/',
        		'caracteres'    => 'A-000-AAA',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Publico Local Entidades Federativas',
        		'modalidad'     => 'Camiones',
        		'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{3})(\d{2})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => '0-AAA-00A',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Publico Local Entidades Federativas',
        		'modalidad'     => 'Autobuses',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{5})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'A-00000-A',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Publico Local Entidades Federativas',
        		'modalidad'     => 'Remolques',
        		'expresion'     => '/^(\d{5})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => '00000-AA',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Autos Antiguos',
        		'modalidad'     => 'CDMX',
        		'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{2})(\d{2})$/',
        		'caracteres'    => '0AA-00',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado Autos Antiguos',
        		'modalidad'     => 'EF',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{1})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'AA-0-A',
        		'longitud'      => 4
        	],
        	[
        		'tipo_servicio' => 'Servicio Publico Local',
        		'modalidad'     => 'CDMX Moto',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(1)([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'AA1AA',
        		'longitud'      => 5
        	],
            [
                'tipo_servicio' => 'Servicio Publico Local',
                'modalidad'     => 'EF Moto',
                'expresion'     => '/^([A-H,J-N,P-Z]{2})(1)([A-H,J-N,P-Z]{2})$/',
                'caracteres'    => 'AA1AA',
                'longitud'      => 5
            ],
        	[
        		'tipo_servicio' => 'Servicio Publico Local',
        		'modalidad'     => 'EF Moto',
        		'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{3})(\d{1})$/',
        		'caracteres'    => '0AAA0',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Demostración',
        		'modalidad'     => 'CDMX y EF Motocicletas',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{3})([A-H,J-N,P-Z]{1})$/',
        		'caracteres'    => 'A000A',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado',
        		'modalidad'     => 'CDMX y EF Motocicletas',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{2})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'A00AA',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado',
        		'modalidad'     => 'CDMX y EF Motocicletas',
        		'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{1})(\d{1})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => '0A0AA',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Transporte Privado',
        		'modalidad'     => 'CDMX y EF Motocicletas',
        		'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{1})([A-H,J-N,P-Z]{2})(\d{1})$/',
        		'caracteres'    => 'A0AA0',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Vehiculo Ecologico',
        		'modalidad'     => 'CDMX y EF',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{1})(\d{3})$/',
        		'caracteres'    => '00A-000',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Ambulancias',
        		'modalidad'     => 'CDMX y EF',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{3})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'AA-000-AA',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Bomberos',
        		'modalidad'     => 'CDMX y EF',
        		'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{3})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'AA-000-AA',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Proteccion Civil',
        		'modalidad'     => 'Coordinación Nacional de Proteccion Civil',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(\d{3})$/',
        		'caracteres'    => '00-AA-000',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Proteccion Civil',
        		'modalidad'     => 'CDMX y EF',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(\d{3})$/',
        		'caracteres'    => '00-AA-000',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Servicio de Escoltas',
        		'modalidad'     => 'CDMX Automoviles',
        		'expresion'     => '/^([A-H,J-N,P-Z]{3})(\d{2})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'AAA-00-AA',
        		'longitud'      => 7
        	],
        	[
        		'tipo_servicio' => 'Servicio de Escoltas',
        		'modalidad'     => 'CDMX Moto',
        		'expresion'     => '/^([A-H,J-N,P-Z]{3})(\d{1})([A-H,J-N,P-Z]{2})$/',
        		'caracteres'    => 'AAA0AA',
        		'longitud'      => 6
        	],
        	[
        		'tipo_servicio' => 'Capacidades Diferentes',
        		'modalidad'     => 'CDMX Vehiculos',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{1})(\d{2})$/',
        		'caracteres'    => '00-A-00',
        		'longitud'      => 5
        	],
        	[
        		'tipo_servicio' => 'Capacidades Diferentes',
        		'modalidad'     => 'EF Vehiculos',
        		'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{3})$/',
        		'caracteres'    => '00-AAA',
        		'longitud'      => 5
        	],

            /*************************************************************
             *
             *  NORMA Oficial Mexicana NOM-001-SCT-2-2000
             *
             *************************************************************/

            // AUTOTRANSPORTE FEDERAL
            
            [
                'tipo_servicio' => 'Autotransporte Federal (2000)',
                'modalidad'     => 'Unidades Motrices y Remolques',
                'expresion'     => '/^(\d{3})([A-H,J-N,P-Z]{3})(\d{1})$/',
                'caracteres'    => '000-AA-0',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Autotransporte Federal (2000)',
                'modalidad'     => 'Transfronterizo de carga',
                'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{2})(\d{3})$/',
                'caracteres'    => '0-AA-000',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Autotransporte Federal (2000)',
                'modalidad'     => 'Transfronterizo de pasaje',
                'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{3})([A-H,J-N,P-Z]{2})$/',
                'caracteres'    => 'A-000-AA',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Autotransporte Federal (2000)',
                'modalidad'     => 'Pasaje Económico y Mixto (Midibús)',
                'expresion'     => '/^(\d{5})([A-H,J-N,P-Z]{1})$/',
                'caracteres'    => '00-000-A',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Autotransporte Federal (2000)',
                'modalidad'     => 'Traslado Nacional (Para todo tipo de vehiculos)',
                'expresion'     => '/^(\d{4})([A-H,J-N,P-Z]{2})$/',
                'caracteres'    => '00-00-AA',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Autotransporte Federal (2000)',
                'modalidad'     => 'Paquetería y mensajería',
                'expresion'     => '/^(\d{2})([A-H,J-N,P-Z]{2})(\d{2})$/',
                'caracteres'    => '00-AA-00',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Autotransporte Federal (2000)',
                'modalidad'     => 'Discapacitados',
                'expresion'     => '/^(\d{3})([A-H,J-N,P-Z]{1})$/',
                'caracteres'    => '000-A',
                'longitud'      => 4
            ],

            // TRANSPORTE PRIVADO FRONTERIZO

            [
                'tipo_servicio' => 'Transportes Privados Fronterizos (2000)',
                'modalidad'     => 'Automóviles',
                'expresion'     => '/^(\d{3})([A-H,J-N,P-Z]{3})(\d{1})$/',
                'caracteres'    => '000-AAA-0',
                'longitud'      => 7
            ],
            [
                'tipo_servicio' => 'Transportes Privados Fronterizos (2000)',
                'modalidad'     => 'Camiones, Autobuses y Remolques',
                'expresion'     => '/^([A-H,J-N,P-Z]{3})(\d{4})$/',
                'caracteres'    => 'AAA-00-00',
                'longitud'      => 7
            ],

            // PUBLICO LOCAL FRONTERIZOS

            [
                'tipo_servicio' => 'Público Local Fronterizos (2000)',
                'modalidad'     => 'Automóviles, Camiones, Autobuses y Remolques',
                'expresion'     => '/^(\d{4})([A-H,J-N,P-Z]{3})$/',
                'caracteres'    => '00-00-AAA',
                'longitud'      => 7
            ],

            // CORPORACIONES POLICIACAS Y DE VIGILANCIA

            [
                'tipo_servicio' => 'Corporaciones Policiacas y de Vigilancia (2000)',
                'modalidad'     => 'Todo tipo de Vehiculos',
                'expresion'     => '/^(\d{5})$/',
                'caracteres'    => '00-000',
                'longitud'      => 5
            ],

            // TRANSPORTES PRIVADOS

            [
                'tipo_servicio' => 'Transportes Privados (2000)',
                'modalidad'     => 'Demostración, Distrito Federal (Todo tipo de vehiculos)',
                'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{2})/',
                'caracteres'    => 'AA-00',
                'longitud'      => 4
            ],

            // TRANSPORTES PRIVADOS

            [
                'tipo_servicio' => 'Transportes Privados (2000)',
                'modalidad'     => 'Demostración Entidades Federativas (Todo tipo de vehiculos)',
                'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{2})(\d{3})$/',
                'caracteres'    => '0-AA-000',
                'longitud'      => 6
            ],
            
            // TRANSPORTES PRIVADOS (DISTRITO FEDERAL)

            [
                'tipo_servicio' => 'Transportes Privados (Distrito Federal 2000)',
                'modalidad'     => 'Automoviles',
                'expresion'     => '/^(\d{3})([A-H,J-N,P-Z]{3})$/',
                'caracteres'    => '000-AAA',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Transportes Privados (Distrito Federal 2000)',
                'modalidad'     => 'Camiones',
                'expresion'     => '/^(\d{4})([A-H,J-N,P-Z]{2})$/',
                'caracteres'    => '00-00-AA',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Transportes Privados (Distrito Federal 2000)',
                'modalidad'     => 'Autobuses',
                'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{3})$/',
                'caracteres'    => '0-AAA',
                'longitud'      => 4
            ],
            [
                'tipo_servicio' => 'Transportes Privados (Distrito Federal 2000)',
                'modalidad'     => 'Remolques',
                'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{4})$/',
                'caracteres'    => 'A-00-00',
                'longitud'      => 5
            ],
            
            // TRANSPORTES PRIVADOS (ENTIDADES FEDERATIVAS)

            [
                'tipo_servicio' => 'Transportes Privados (Entidades Federativas 2000)',
                'modalidad'     => 'Automoviles',
                'expresion'     => '/^([A-H,J-N,P-Z]{3})(\d{4})$/',
                'caracteres'    => 'AAA-00-00',
                'longitud'      => 7
            ],
            [
                'tipo_servicio' => 'Transportes Privados (Entidades Federativas 2000)',
                'modalidad'     => 'Camiones',
                'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{5})$/',
                'caracteres'    => 'AA-00-000',
                'longitud'      => 7
            ],
            [
                'tipo_servicio' => 'Transportes Privados (Entidades Federativas 2000)',
                'modalidad'     => 'Autobuses',
                'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{3})(\d{2})$/',
                'caracteres'    => '0-AAA-00',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Transportes Privados (Entidades Federativas 2000)',
                'modalidad'     => 'Remolques',
                'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{2})(\d{4})$/',
                'caracteres'    => '0-AA-0000',
                'longitud'      => 7
            ],

            // PUBLICO LOCAL (DISTRITO FEDERAL)
            
            [
                'tipo_servicio' => 'Público Local (Distrito Federal 2000)',
                'modalidad'     => 'Libre y Sitio',
                'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{5})$/',
                'caracteres'    => 'A-00-000',
                'longitud'      => 6
            ],
            [
                'tipo_servicio' => 'Público Local (Distrito Federal 2000)',
                'modalidad'     => 'Con itinerario fijo',
                'expresion'     => '/^(\d{7})$/',
                'caracteres'    => '000-00-00',
                'longitud'      => 7
            ],
            [
                'tipo_servicio' => 'Público Local (Distrito Federal 2000)',
                'modalidad'     => 'Autobuses, Camiones y Remolques',
                'expresion'     => '/^(\d{6})$/',
                'caracteres'    => '000-000',
                'longitud'      => 6
            ],

            // PUBLICO LOCAL (ENTIDADES FEDERATIVAS)

            [
                'tipo_servicio' => 'Público Local (Entidades Federativas 2000)',
                'modalidad'     => 'Automoviles',
                'expresion'     => '/^(\d{4})([A-H,J-N,P-Z]{3})$/',
                'caracteres'    => '00-00-AAA',
                'longitud'      => 7
            ],
            [
                'tipo_servicio' => 'Público Local (Entidades Federativas 2000)',
                'modalidad'     => 'Camiones',
                'expresion'     => '/^(\d{1})([A-H,J-N,P-Z]{3})(\d{3})$/',
                'caracteres'    => '0-AAA-000',
                'longitud'      => 7
            ],
            [
                'tipo_servicio' => 'Público Local (Entidades Federativas 2000)',
                'modalidad'     => 'Autobuses',
                'expresion'     => '/^(\d{6})([A-H,J-N,P-Z]{1})$/',
                'caracteres'    => '000-000-A',
                'longitud'      => 7
            ],
            [
                'tipo_servicio' => 'Público Local (Entidades Federativas 2000)',
                'modalidad'     => 'Remolques',
                'expresion'     => '/^([A-H,J-N,P-Z]{1})(\d{6})$/',
                'caracteres'    => 'A-000-000',
                'longitud'      => 7
            ],

            // TRANSPORTES PRIVADOS (AUTOS ANTIGUOS)

            [
                'tipo_servicio' => 'Transportes Privados (Autos Antiguos 2000)',
                'modalidad'     => 'Distrito Federal',
                'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{3})$/',
                'caracteres'    => 'AA-000',
                'longitud'      => 5
            ],
            [
                'tipo_servicio' => 'Transportes Privados (Autos Antiguos 2000)',
                'modalidad'     => 'Entidades Federativas',
                'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{2})$/',
                'caracteres'    => 'AA-00',
                'longitud'      => 4
            ],

            // HEROICO CUERPO DE BOMBEROS

            [
                'tipo_servicio' => 'H. Cuerpo de Bomberos',
                'modalidad'     => 'Distrito Federal',
                'expresion'     => '/^(\d{4})$/',
                'caracteres'    => '00-00',
                'longitud'      => 4
            ],
            [
                'tipo_servicio' => 'H. Cuerpo de Bomberos',
                'modalidad'     => 'Entidades Federativas',
                'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{4})$/',
                'caracteres'    => 'AA-00-00',
                'longitud'      => 6
            ],

            // INSPECCION DE VÍAS GENERALES DE COMUNICACIÓN

            [
                'tipo_servicio' => 'Inspección de Vías Generales de Comunicación',
                'modalidad'     => 'SCT',
                'expresion'     => '/^([A-H,J-N,P-Z]{2})(\d{2})/',
                'caracteres'    => 'AA-00',
                'longitud'      => 4
            ],
        ]);

    }
}
