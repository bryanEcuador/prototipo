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
      public fuction up(){Schema::create('table_proveedores',fuction (Blueprint $table){ 
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
        $table->string('fono_representante');
        $table->string('fono_gerente');
        $table->string('usuario');
        $table->string('contraseña')
        $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        {Schema::drop('table_proveedores');
    }
}
