<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('Vehiculos',function(Blueprint $table){
             $table->increments('id');
             $table->integer('inmueble_id')->unsigned()->nullable();
             $table->foreign('inmueble_id')->references('id')->on('inmuebles');
             //$table->integer('inmueble_id')->unsigned()->nullable();
             //$table->foreign('inmueble_id')->references('id')->on('inmuebles');
             $table->string('Placa');
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
         Schema::drop('Vehiculos');
     }
}
