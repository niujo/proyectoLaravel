<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idCliente')->unsigned();
            $table->foreign('idCliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->integer('idProducto')->unsigned();
            $table->foreign('idProducto')->references('id')->on('producto');
            $table->integer('cantidad');
            $table->decimal('precio',10,2);
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
        Schema::dropIfExists('venta');
    }
}
