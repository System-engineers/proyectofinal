<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteServicioTable extends Migration
{
    public function up()
    {
        Schema::create('cliente_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('servicio_id')->unsigned();
            $table->integer('precio');
            
            $table->foreign('cliente_id')->references('id')->on('clientes')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('servicio_id')->references('id')->on('servicios')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('cliente_servicio');
    }
}
