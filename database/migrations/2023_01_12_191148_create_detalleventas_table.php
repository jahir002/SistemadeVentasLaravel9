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
        Schema::create('detalleventas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('idven')->unsigned();
            $table->bigInteger('id_productos')->unsigned();
            $table->decimal('precio',10,2);
            $table->integer('cantidad');
            $table->decimal('subtotal',10,2);
            $table->decimal('igv',10,2);
            $table->decimal('total',10,2);
            $table->string('estado');

            $table->foreign('idven')->references('id')->on('ventas')->onDelete("cascade");

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
        Schema::dropIfExists('detalleventas');
    }
};
