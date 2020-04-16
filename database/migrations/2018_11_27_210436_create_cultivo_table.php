<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivo', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fechaestablecimiento');
            $table->string('analisissuelo');
            $table->string('proveedorsemilla');
            $table->string('sistemacultivo');
            $table->string('tipotrazado');
            $table->date('edadtrazado');

            $table->date('fechaarvanses');
            $table->string('nombrecontrolarvanses');
            $table->string('controlutilizadoarvanses');

            $table->date('fechaplagas');
            $table->string('nombremanejoplagas');
            $table->string('controlutilizadoplagas');

            $table->date('fechamanejoenfermedades');
            $table->string('nombremanejoenfermedades');
            $table->string('controlutilizadoenfermedades');

            $table->string('imagen')->nullable();

            $table->integer('finca_id')->unsigned();
            $table->foreign('finca_id')->references('id')->on('finca')->onDelete('cascade');

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
        Schema::dropIfExists('cultivo');
    }
}
