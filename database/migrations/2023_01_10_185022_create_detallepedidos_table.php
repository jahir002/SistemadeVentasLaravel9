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
        Schema::create('detallepedidos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_pedidos')->unsigned();
            $table->bigInteger('id_productos')->unsigned();
            $table->integer('cantidad');
            $table->string('estado');
            $table->foreign('id_pedidos')->references('id')->on('pedidos')->onDelete("cascade");
            $table->foreign('id_productos')->references('id')->on('productos')->onDelete("cascade");



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
        Schema::dropIfExists('detallepedidos');
    }
};
