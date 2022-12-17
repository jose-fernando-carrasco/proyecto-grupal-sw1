<?php

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAdopcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro__adopcion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('domicilio');
            $table->double('longitudDom');
            $table->double('latitudDom');
            $table->enum('estado',['adoptado, adopcion'])->nullable()->default('adopcion');
            $table->foreignId('duenho_id')->constrained('users');
            $table->foreignId('mascota_id')->constrained();
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
        Schema::dropIfExists('registro__adopcions');
    }
}
