<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:create('Colaboradores', function(Blueprint $table){
            $table->increments('IdColaborador');
            $table->string('NombreUsuario');
            $table->string('Cedula');
            $table->text('Direccion');
            $table->string('PuestoDeTrabajo');
            $table->text('LugarDeTrabajo');
            $table->string('Telefono');
            $table->integer('Estado');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:drop('Colaboradores');
    }
}
