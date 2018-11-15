<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_imagenes',function (Blueprint $table){
        $table->increments('id');
        $table->unsignedInteger('producto_id');
        $table->foreign('producto_id')->references('id')->on('tb_producto');
        $table->unsignedInteger('color_id');
        $table->foreign('color_id')->references('id')->on('tb_colores');
        $table->string('imagen1')->nullable();
        $table->string('imagen2')->nullable();
        $table->string('imagen3')->nullable();
        $table->string('imagen4')->nullable();
        $table->string('imagen5')->nullable();

        });  //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('tb_imagenes');//
    }
}
