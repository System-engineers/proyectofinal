<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres',150)->unique();
            $table->string('direccion',250);
            $table->string('telefono',30)->unique();
            $table->string('email',250);
            $table->integer('especial');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
