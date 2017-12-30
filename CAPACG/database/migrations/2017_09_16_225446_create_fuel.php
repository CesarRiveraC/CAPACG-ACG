<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('Combustibles',function(Blueprint $table){
             $table->increments('id');
             
             $table->integer('vehiculo_id')->unsigned()->nullable();
             $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
 
             $table->integer('colaborador_id')->unsigned()->nullable();
             $table->foreign('colaborador_id')->references('id')->on('colaboradores');
 
             $table->integer('dependencia_id')->unsigned()->nullable();
             $table->foreign('dependencia_id')->references('id')->on('dependencias');

             $table->string('NoVaucher');
             $table->double('Monto');
             $table->integer('Numero');
             $table->date('Fecha');
             $table->integer('Estado');
             $table->string('Justificacion');
             //$table->string('Placa'); ya no se usa porque ahora las relaciones se hacen usando id
             $table->string('Kilometraje');
             $table->double('LitrosCombustible');
            //  $table->string('FuncionarioQueHizoCompra'); ya no se utiliza porque ahora se hace la referencia con el id de colaborador
             $table->binary('Foto');
             $table->string('CodigoDeAccionDePlanPresupuesto');
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
         Schema::dropIfExists('Combustibles');
     }
}
