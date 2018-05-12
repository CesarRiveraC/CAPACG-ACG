<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivestocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('semovientes',function(Blueprint $table){
             $table->increments('id');
             $table->integer('activo_id')->unsigned()->nullable();
             $table->foreign('activo_id')->references('id')->on('activos');
             //$table->string('Placa'); ya no es necesario porque la relacion se hace con id
             $table->string('Raza');
             $table->string('Edad');
             $table->integer('Peso');
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
         
         Schema::dropIfExists('semovientes');
     }
}
