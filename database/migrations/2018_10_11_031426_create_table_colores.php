<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableColores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_colores',function (Blueprint $table){
        $table->increments('id');  //
        $table->string('nombre');
        $table->string('hexadecimal');
        $table->string('descripcion');

        });  //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::drop('tb_colores');   //
    }
}
