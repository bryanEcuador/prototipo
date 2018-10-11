<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubcategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tb_sub_categoria',function (Blueprint $table){
        $table->increments('id'); 
        $table->unsignedInteger('categoria_id');
        $table->foreign('categoria_id')->references('id')->on('tb_categoria'); //
        $table->string('nombre');
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_sub_categoria'); //
    }
}
