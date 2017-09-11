<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vehiculos',function(Blueprint $table){
            $table->increments('IdVehiculo');
            $table->string('Placa');
            $table->integer('IdInmueble');
        });    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:drop('Vehiculos');
    }
}
