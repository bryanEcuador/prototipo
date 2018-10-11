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
        public fuction up(){Schema::create('table_imagenes',fuction (Blueprint $table){ 
        $table->increments('id'); 
        $table->int('id_color');
$table->foreign('id_color')->references('id')->on('tabla_colores');
        //

        $table->string('id_producto');
     $table->timestamps();
        });  //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         {Schema::drop('table_imagenes');//
    }
}
