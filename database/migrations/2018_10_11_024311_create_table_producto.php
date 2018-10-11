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
         public fuction up(){Schema::create('table_producto',fuction (Blueprint $table){ 
        $table->increments('id'); 
        $table->foreign('id') ->references('id_producto')->on('table_imagenes');
        $table->int('id_categoria');
        $table->foreign('id_categoria')->references('id')->on('table_categoria');
        $table->int('id_subcategoria');
        $table->foreign('id_subcategoria')->references('id')->on('table_subcategoria');
        $table->int('id_marca');
        $table->foreign('id_marca')->references('id')->on('table_marca');
        $table->string('descripcion');
        $table->string('nombre');
        $table->string('codigo');
        $table->int('precio');
        $table->int('iva');
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
        {Schema::drop('table_producto');
    }
}
