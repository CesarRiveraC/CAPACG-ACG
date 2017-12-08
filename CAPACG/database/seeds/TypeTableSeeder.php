<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'Tipo' => 'SINAC',
            'Estado' => '1',
        ]);
        DB::table('tipos')->insert([
            'Tipo' => 'Fundación de Parques',
            'Estado' => '1',
        ]);

    }
}
