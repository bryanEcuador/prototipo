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
       public fuction up(){Schema::create('table_subcategoria',fuction (Blueprint $table){ 
        $table->increments('id'); 
        $table->int('id_categoria')
        $table->foreign('id_categoria')->references('id')->on('table_categoria'); //
        $table->string('nombre');
     $table->timestamps();
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        {Schema::drop('table_subcategoria'); //
    }
}
