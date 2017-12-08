<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //rol con mas permisos en el sistema
        DB::table('roles')->insert([
            'Rol' => 'Administrador',

        ]);

        DB::table('roles')->insert([
            'Rol' => 'Estandar',

        ]);

        //rol con permisos de colaborador(ver activos a cargo)
        DB::table('roles')->insert([
            'Rol' => 'Colaborador',

        ]);

    }
}
