<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
   
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('id');
            $table->integer('total');
            $table->integer('abono');
            $table->integer('saldo');
            $table->integer('estado');
            $table->bigInteger('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('ordenes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
