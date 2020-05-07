<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sala');
            $table->enum('tipo_procesador', ['x86', 'x64', 'arm', 'arm64']);
            $table->unsignedSmallInteger('ram');
            $table->unsignedSmallInteger('hdd');
            $table->string('so', 50);
            $table->string('monitor', 50);
            $table->date('fecha_mantenimiento');
            $table->text('observacion');
            $table->boolean('activo');
            $table->timestamps();
            $table->foreign('sala')->references('id')->on('salas');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
