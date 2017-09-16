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
             $table->integer('Placa');
             $table->integer('NumeroFinca');
             $table->integer('AreaConstruccion');
             $table->integer('AreaTerreno');
             $table->string('AñoFabricacion');   
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
         Schema::drop('Infraestructuras');
     }
}
