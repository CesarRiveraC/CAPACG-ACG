<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfraestructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Infraestructuras',function(Blueprint $table){
            $table->increments('IdInfrestructura');
            $table->integer('Placa');
            $table->integer('NumeroFinca');
            $table->integer('AreaConstruccion');
            $table->integer('AreaTerreno');
            $table->string('AñoFabricacion');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:drop('Infraestructuras');
    }
}
