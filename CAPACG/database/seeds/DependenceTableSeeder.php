<?php

use Illuminate\Database\Seeder;

class DependenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Dirección área silvestre protegida',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Programa del manejo del fuego',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Programa de prevención, protección, control',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Programa Ecoturismo',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Programa Investigación',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Programa Educación Biológica',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Planificación',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Programa de restauración y silvicultura',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Unidad de Control Interno',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Sistema de Información Geográfica',
                'Estado' => '1',
            ]);

        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Recursos Humanos',
                'Estado' => '1',
            ]);

        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Dirección',
                'Estado' => '1',
            ]);

        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Direccion Administrativa y Financiera',
                'Estado' => '1',
            ]);
        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Forestal y Recursos Natural y Vida Silvestre',
                'Estado' => '1',
            ]);

        DB::table('dependencias')->insert(
            [
                'Dependencia' => 'Oficina Subregional Liberia',
                'Estado' => '1',
            ]);
    }
}
