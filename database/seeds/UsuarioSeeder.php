<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
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
        	'use_apellido'=>'Espin',
        	'use_correo'=>'Ferroviaria',
        	'use_cedula'=>'1234567898',
        	'use_telefono'=>'0985924671',
        	'email'=>'mikaespin@gmail.com',
        	'password'=>bcrypt('1234567898'),
        	'created_at'=>date('2022-03-21'),
        	
        ]);
    }
}
