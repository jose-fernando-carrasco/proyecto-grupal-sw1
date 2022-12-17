<?php

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPerdidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro__perdidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('ubicacion');
            $table->double('longitudUb');
            $table->double('latitudUb');
            $table->enum('estado', ['perdido', 'encontrado'])->nullable();
            $table->foreignId('mascota_id')->constrained();
            $table->foreignId('duenho_id')->constrained('users');
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
        Schema::dropIfExists('registro__perdidos');
    }
}
