<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMarca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       public fuction up(){Schema::create('table_marca',fuction (Blueprint $table){ 
        $table->increments('id');  //
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
        {Schema::drop('table_marca');//
    }
}
