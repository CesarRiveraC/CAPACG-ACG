<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfraestructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('Infraestructuras',function(Blueprint $table){
             $table->increments('id');
             $table->integer('activo_id')->unsigned()->nullable();
             $table->foreign('activo_id')->references('id')->on('activos');
             //$table->integer('Placa'); // ya no es necesario porque la relacion se hace con id
             $table->integer('NumeroFinca');
             $table->integer('AreaConstruccion');
             $table->integer('AreaTerreno');
             $table->string('AnoFabricacion');   
             $table->timestamps();         
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('Infraestructuras');
     }
}
