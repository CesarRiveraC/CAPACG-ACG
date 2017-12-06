<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //la migracion para crear los roles de usuario, se han definido en la migracion de usuarios, al necesitar primero la tabla roles por la llave foranea.



        // Schema::create('roles', function(Blueprint $table){
        //     $table->increments('id');
        //     $table->string('Rol');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //al igual que el up el down tambien ha sido definido desde la migracion de usuarios.
         // Schema::dropIfExists('roles');
        
    }
}
