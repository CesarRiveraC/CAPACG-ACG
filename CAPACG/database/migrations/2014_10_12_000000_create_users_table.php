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
      
        Schema::create('roles', function(Blueprint $table){
            $table->increments('id');
            $table->string('Rol');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Apellido');
            $table->integer('roles_id')->unsigned()->nullable();
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');;
            $table->integer('Estado');// Este ya guarda por defecto un valor (1 activo, 0 inactivo), se le puede cambiar si, en el controlador
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
        Schema::dropIfExists('users');
        
        Schema::dropIfExists('roles');
        
    }
}
