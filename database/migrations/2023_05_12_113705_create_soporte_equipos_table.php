<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoporteEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soporte_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_id')->index('fk_soporte_equipos_soporte_equipo_tipos_idx');
            $table->string('numero_serie')->unique('numero_serie_UNIQUE');
            $table->string('imei')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soporte_equipos');
    }
}
