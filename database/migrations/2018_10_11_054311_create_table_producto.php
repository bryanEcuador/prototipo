<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tb_producto',function (Blueprint $table){
        $table->increments('id');
        $table->unsignedInteger('id_categoria');
        $table->foreign('id_categoria')->references('id')->on('tb_categoria');
        $table->unsignedInteger('id_sub_categoria');
        $table->foreign('id_sub_categoria')->references('id')->on('tb_sub_categoria');
        $table->unsignedInteger('id_marca');
        $table->foreign('id_marca')->references('id')->on('tb_marca');
        $table->string('descripcion');
        $table->string('nombre');
        $table->string('codigo');
        $table->integer('precio');
        $table->integer('iva');
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
        Schema::drop('tb_producto');
    }
}
