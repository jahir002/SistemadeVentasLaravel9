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
        Schema::create('ventas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
           
            $table->string('serie');
            $table->string('numero');
            $table->string('fechaemision');
            $table->string('formatopago');
            $table->bigInteger('id_empleados')->unsigned();
            $table->bigInteger('id_clientes')->unsigned();
           

            

            $table->foreign('id_empleados')->references('id')->on('empleados')->onDelete("cascade");

            $table->foreign('id_clientes')->references('id')->on('clientes')->onDelete("cascade");

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
};
