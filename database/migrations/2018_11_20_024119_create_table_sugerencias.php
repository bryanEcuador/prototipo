<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSugerencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
   Schema::create('sugerencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sugerencia');
            $table->integer('tipo_sugerencia');
            $table->integer('usuario');
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
        Schema::dropIfExists('sugerencias');
    }
}

