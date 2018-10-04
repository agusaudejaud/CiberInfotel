<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ventas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('fecha');
            $table->integer('articulos_id')->unsigned();
            $table->foreign('articulos_id')->references('id')->on('articles');
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->decimal('precio_venta', 5, 2);
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
          Schema::dropIfExists('ventas');
    }
}