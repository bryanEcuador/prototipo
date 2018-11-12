<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_proveedores', function (Blueprint $table){
        $table->increments('id');
        $table->string('codigo_externo');
        $table->String('tipo_empresa');
        $table->string('ruc');
        $table->string('razon_social');
        $table->string('representante_legal');
        $table->string('direccion');
        $table->string('banco');
        $table->string('cuenta_bancaria');
        $table->string('estado');
        $table->string('gerente_general');
        $table->string('telefono_representante');
        $table->string('telefono_gerente');
        $table->integer('user_id')->references('id')->on('users');;
        });
      }
        //
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_proveedores');
    }
}
