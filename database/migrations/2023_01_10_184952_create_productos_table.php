<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->string('nombre');
            $table->bigInteger('id_categorias')->unsigned();
            $table->string('descripcion');
            $table->bigInteger('id_marcas')->unsigned();
            $table->string('talla');
            $table->bigInteger('id_proveedors')->unsigned();
            $table->decimal('precioventa',10,2);
            $table->decimal('preciocompra',10,2);
            $table->integer('cantidad');
            $table->integer('stock');
            $table->string('estado');

            $table->foreign('id_categorias')->references('id')->on('categorias')->onDelete("cascade");

            $table->foreign('id_marcas')->references('id')->on('marcas')->onDelete("cascade");

            $table->foreign('id_proveedors')->references('id')->on('proveedors')->onDelete("cascade");
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
        Schema::dropIfExists('productos');
    }
};
