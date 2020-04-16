<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosechaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosecha', function (Blueprint $table) {
            $table->increments('id');

            $table->string('aspecto');
            $table->string('color');
            $table->string('porcefrutomaduro');
            $table->string('porcefrutodañadobroca');
            $table->date('fecha');
            $table->string('tiposrecoleccion');
            $table->string('condicionesclimaticas');
            $table->string('nombreresponsable');
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
        Schema::dropIfExists('cosecha');
    }
}
