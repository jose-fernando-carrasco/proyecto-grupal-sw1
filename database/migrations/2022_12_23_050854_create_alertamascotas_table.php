<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertamascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertamascotas', function (Blueprint $table) {
            $table->id();
            $table->double('latitud');
            $table->double('longitud');
            $table->string('detalle');
            $table->unsignedBigInteger('mascota_id');
            // $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alertamascotas');
    }
}
