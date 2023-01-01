<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_vacuna', 
                        ['Vacuna contra el distemper',
                         'Vacuna contra parvovirus',
                         'Vacuna contra la hepatitis infecciosa canina o adenovirus canino 2 (AVC-2)',
                         'Vacuna contra la leptospirosis',
                         'Vacuna contra la rabia'])->nullable(false);
            $table->string('detalle', 100)->nullable(true);
            $table->date('fecha')->nullable()->default(new DateTime());
            $table->unsignedBigInteger('mascota_id');
            $table->foreign('mascota_id')
                    ->references('id')
                    ->on('mascotas')
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
        Schema::dropIfExists('vacunas');
    }
}
