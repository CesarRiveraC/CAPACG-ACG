<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('Activos',function(Blueprint $table){
             $table->increments('id'); 
             $table->integer('colaborador_id')->unsigned()->nullable();
             $table->foreign('colaborador_id')->references('id')->on('colaboradores');
             $table->string('Placa');
             $table->text('Descripcion'); // se define de tipo text por ser la descripcion del activo
             $table->string('Direccion'); // se refiere a la direccion del colaborador asignado al activo.
             $table->string('Programa');
             $table->string('SubPrograma');
             $table->string('Color');
             $table->string('Respondable'); 
             $table->string('Cedula');
             $table->binary('Foto');      // se define el campo como binario para poder almacenar la foto del activo.
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
         Schema::drop('Activos');
     }
 
}
