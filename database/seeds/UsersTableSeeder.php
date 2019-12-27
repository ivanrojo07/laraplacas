<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	'name'=>'sedena',
        	'email'=>'sspsinaloa@gob.com',
        	'password'=> bcrypt('seguridadsinaloa')
        ]);
    }
}
