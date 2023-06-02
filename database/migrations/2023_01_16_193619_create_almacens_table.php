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
        Schema::create('almacens', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('codigopro')->unique();
            $table->bigInteger('id_productos')->unsigned();
            $table->bigInteger('id_proveedors')->unsigned();
            $table->integer('cantidad');
            $table->decimal('valortotal',10,2);
            $table->string('estado');

            $table->foreign('id_productos')->references('id')->on('productos')->onDelete("cascade");
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
        Schema::dropIfExists('almacens');
    }
};
