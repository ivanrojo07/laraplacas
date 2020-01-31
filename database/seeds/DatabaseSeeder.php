<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TipoServiciosTableSeeder::class);
        $this->call(CamarasUbicacionsTableSeeder::class);
        $this->call(Sistema_0Seeder::class);
        $this->call(Sistema_1Seeder::class);
        $this->call(Sistema_11Seeder::class);
        $this->call(Sistema_13Seeder::class);
        $this->call(Sistema_14Seeder::class);
        $this->call(Sistema_15Seeder::class);
        $this->call(Sistema_16Seeder::class);
        $this->call(Sistema_17Seeder::class);
        $this->call(Sistema_18Seeder::class);
        $this->call(Sistema_19Seeder::class);
        $this->call(Sistema_21Seeder::class);
        $this->call(Sistema_22Seeder::class);
        $this->call(Sistema_43Seeder::class);
        $this->call(Sistema_44Seeder::class);

    }
}
