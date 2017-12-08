<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DependenceTableSeeder::class);
        $this->call(SectorTableSeeder::class);
        $this->call(TypeTableSeeder::class);
    }
}
