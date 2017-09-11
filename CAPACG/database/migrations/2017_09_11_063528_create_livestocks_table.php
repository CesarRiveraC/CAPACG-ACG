<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivestocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Semovientes',function(Blueprint $table){
            $table->increments('IdSemoviente');
            $table->string('Placa');
            $table->string('Raza');
            $table->string('Edad');
            $table->integer('Peso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema:drop('Semovientes');
    }
}
