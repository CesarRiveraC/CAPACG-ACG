<?php

use Illuminate\Database\Seeder;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectores')->insert([
            'Sector' => 'Santa Rosa',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Pocosol',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Santa María',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Murciélago',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Cacao',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Maritza',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Santa Elena',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Subregional Liberia',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'El Hacha',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Estación Experimental Horizontes',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Naranjo',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Nancite',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Refugio de Vida Silvestre Bahía Junquillal',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Pitilla',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'San Cristóbal',
            'Estado' => '1',
        ]);
        DB::table('sectores')->insert([
            'Sector' => 'Pailas',
            'Estado' => '1',
        ]);

    }
}
