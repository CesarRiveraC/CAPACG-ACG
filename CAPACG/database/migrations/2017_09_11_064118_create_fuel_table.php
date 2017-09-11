<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Combustibles',function(Blueprint $table){
            $table->increments('NoVaucher');
            $table->double('Monto');
            $table->integer('Numero');
            $table->datetime('Fecha');
            $table->string('Placa');
            $table->string('Kilometraje');
            $table->double('LitrosCombustible');
            $table->string('FuncionarioQueHizoCompra');
            $table->string('Dependencia');
            $table->binary('Foto');
            $table->string('CodigoDeAccionDePlanPresupuesto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:drop('Combustibles');
    }
}
