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
         Schema::create('Colaboradores', function(Blueprint $table){
             $table->increments('id');
             $table->integer('user_id')->unsigned()->nullable();
             $table->foreign('user_id')->references('id')->on('users');
             ///$table->string('NombreUsuario'); este campo ya no se usa, porque la relacion ahora se hace por user_id
             $table->string('Cedula')->unique();
             $table->text('Direccion');
             $table->string('PuestoDeTrabajo');
             $table->text('LugarDeTrabajo');
             $table->string('Telefono');
             $table->integer('Estado');
             $table->timestamps();
         });

         Schema::create('Dependencias',function(Blueprint $table){
            $table->increments('id'); 
            // $table->integer('activo_id')->unsigned()->nullable();
            // $table->foreign('activo_id')->references('id')->on('activos');
            $table->string('Dependencia')->unique();
           
            $table->timestamps();
        });

        Schema::create('Tipos',function(Blueprint $table){
            $table->increments('id'); 
            
            $table->string('Tipo')->unique();
           
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
         Schema::dropIfExists('Colaboradores');
         Schema::dropIfExists('Dependencias');
         Schema::dropIfExists('Tipos');
     }
 
}
