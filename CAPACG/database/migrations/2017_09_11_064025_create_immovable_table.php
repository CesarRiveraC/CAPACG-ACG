<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmovableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Inmuebles',function(Blueprint $table){
            $table->increments('IdInmueble');
            $table->string('Serie');
          //  $table->string('Cedula'); variable definida en clase abstracta.
          //  $table->string('Responsable'); variable no necesaria, esta definida en la clase abstracta activos.
         //   $table->string('Color'); variable definida en clase abstracta.
            $table->string('Dependecia');
            $table->string('EstadoUtilizacion');
            $table->string('EstadoFisico');
            $table->integer('EstadoActivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema;drop('Inmuebles');
    }
}
