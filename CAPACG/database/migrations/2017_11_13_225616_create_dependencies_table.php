<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('Dependencias',function(Blueprint $table){
        //     $table->increments('id'); 
        //     // $table->integer('activo_id')->unsigned()->nullable();
        //     // $table->foreign('activo_id')->references('id')->on('activos');
        //     $table->string('Dependencia')->unique();
           
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
        Schema::drop('Dependencias');
    }
}
