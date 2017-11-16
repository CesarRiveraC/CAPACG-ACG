<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //El metodo que crea esta tabla se encuentra en el archivo create_collaborators_table
        //esto debido a la referencia que tiene con activos
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //el metodo para eliminar esta tabla se encuentra en el archivo create_collaborators_table
    }
}
