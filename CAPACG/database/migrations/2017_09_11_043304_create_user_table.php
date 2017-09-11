<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          
        Schema::create('usuarios', function (blueprint $table){
            $table->increments('id'); //esta variable no esta definida dentro del DDS, podria ser de utilidad
            $table->string('NombreUsuario');
            $table->string('Contraseña');
            $table->string('Nombre');
            $table->string('Apellido'); 
            $table->string('CorreoElectronico');
            $table->string('Rol');
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
        Schema::drop('usuarios');
    }
}
