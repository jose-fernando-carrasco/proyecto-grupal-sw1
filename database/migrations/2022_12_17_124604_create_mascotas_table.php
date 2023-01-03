<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(true);
            $table->string('color')->nullable(true);
            $table->integer('edad')->nullable(true);
            $table->string('imagen',500)->nullable(true);
            $table->boolean('pedigree')->nullable(true);
            $table->unsignedBigInteger('duenho_id')->nullable(true);
            $table->unsignedBigInteger('raza_id')->nullable(true);

            $table->foreign('duenho_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('raza_id')
                    ->references('id')
                    ->on('razas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('mascotas');
    }
}
