<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Nombre');//Lo que es nombre ya esta incluido en el campo name, que lo trae por defecto
            $table->string('Apellido');
            $table->string('Rol');// Estaba pensando cambiar esta a un entero, y a la hora de guardar se le da un valor por defecto
            $table->integer('Estado');// Este ya guarda por defecto un valor, se le puede cambiar si, en el controlador
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
