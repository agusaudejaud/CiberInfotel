<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallePedidos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('cantidad');
            $table->integer('articulo')->unsigned();
            $table->integer('pedido')->unsigned();
            $table->foreign('articulo')->references('id')->on('articles');
            $table->foreign('pedido')->references('id')->on('pedidos');
            $table->decimal('precio_costo', 5, 2);
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
        Schema::dropIfExists('detallePedidos');
    }
}
