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
        Schema::create('registros', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('codigoregistro')->unique();
            $table->string('fechaentrada');
            $table->bigInteger('id_almacens')->unsigned();
            
            $table->string('direcioninicial');
            $table->string('direcionfinal');
            $table->Integer('cantidad');
            $table->decimal('valortotal',10,2);
            $table->string('actividad');
            $table->string('estado');

            
            $table->foreign('id_almacens')->references('id')->on('almacens')->onDelete("cascade");
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
        Schema::dropIfExists('registros');
    }
};
