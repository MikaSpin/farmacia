<?php

use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'users'=>'Mika',
        	'use_nombre'=>'Mika',
        	'use_apellido'=>'Espin',
        	'use_direccion'=>'Ferroviaria',
        	'use_cedula'=>'123456789',
        	'use_telefono'=>'0985924671',
        	'email'=>'mika@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'created_at'=>date('2022-03-21'),
        	
        ]);
    }
}
