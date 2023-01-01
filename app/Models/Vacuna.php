<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;
    protected $fillable = [
        "mascota_id", "detalle", "tipo_vacuna", "fecha"
    ];

}
