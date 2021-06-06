<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_expediente',45);
            $table->string('cabecera_documento',45);
            $table->string('tipo_documento',45);
            $table->string('asunto',45);        
            $table->smallInteger('nro_folios');
            $table->string('file',45);
            $table->dateTime('fecha_tramite');
            $table->boolean('condicion')->default(1);
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('expedientes');
    }
}
