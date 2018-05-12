<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInmovable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('inmuebles',function(Blueprint $table){
             $table->increments('id');
             $table->string('Serie');
             $table->integer('activo_id')->unsigned()->nullable();
             $table->foreign('activo_id')->references('id')->on('activos');
           //  $table->string('Cedula'); variable definida en clase abstracta.
           //  $table->string('Responsable'); variable no necesaria, esta definida en la clase abstracta activos.
          //   $table->string('Color'); variable definida en clase abstracta.
             $table->string('EstadoUtilizacion');
             $table->string('EstadoFisico');
             $table->integer('EstadoActivo');
             $table->string('Marca');
             $table->string('Modelo');
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
         Schema::dropIfExists('inmuebles');
     }
}
