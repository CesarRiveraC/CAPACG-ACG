<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaborators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('colaboradores', function(Blueprint $table){
             $table->increments('id');
             $table->integer('user_id')->unsigned()->nullable();
             $table->foreign('user_id')->references('id')->on('users');
             $table->string('Cedula')->unique();
             $table->string('PuestoDeTrabajo');
             $table->text('LugarDeTrabajo');
             $table->string('Telefono');
             $table->integer('Estado');
             $table->timestamps();
         });

         Schema::create('dependencias',function(Blueprint $table){
            $table->increments('id'); 
            // $table->integer('activo_id')->unsigned()->nullable();
            // $table->foreign('activo_id')->references('id')->on('activos');
            $table->string('Dependencia')->unique();
            $table->integer('Estado');
           
            $table->timestamps();
        });

        Schema::create('tipos',function(Blueprint $table){
            $table->increments('id'); 
            
            $table->string('Tipo')->unique();
            $table->integer('Estado');
           
            $table->timestamps();
        });
        Schema::create('sectores',function(Blueprint $table){
            $table->increments('id'); 
            
            $table->string('Sector')->unique();
            $table->integer('Estado');
           
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
         Schema::dropIfExists('colaboradores');
         Schema::dropIfExists('dependencias');
         Schema::dropIfExists('tipos');
         Schema::dropIfExists('sectores');
         
     }
 
}
