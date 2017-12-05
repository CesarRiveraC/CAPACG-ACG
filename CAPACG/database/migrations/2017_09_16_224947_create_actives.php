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
             $table->integer('sector_id')->unsigned()->nullable();
             $table->foreign('sector_id')->references('id')->on('sectores');
             $table->integer('dependencia_id')->unsigned()->nullable();
             $table->foreign('dependencia_id')->references('id')->on('dependencias');
             $table->integer('tipo_id')->unsigned()->nullable();
             $table->foreign('tipo_id')->references('id')->on('tipos');
             $table->string('Placa')->unique();
             $table->string('Descripcion'); // se define de tipo text por ser la descripcion del activo
             $table->integer('Identificador');
             $table->string('Programa');
             $table->string('SubPrograma');
             $table->string('Color');
             //$table->string('Respondable');// este campo no va ya que esto se hace por medio de la relacion que existe con colaboradores
            // $table->string('Cedula'); //este campo ya no es necesario porque la relacion se hace con id
             $table->string('Foto');      // se define el campo como binario para poder almacenar la foto del activo.
             $table->integer('Estado');
             $table->string('TipoActivo');
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
         Schema::dropIfExists('Activos');
     }
 
}
