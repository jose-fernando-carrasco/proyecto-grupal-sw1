<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Adopcion extends Model
{
    use HasFactory;

    protected $table = 'registro__adopcion';

    protected $fillable = [
        'fecha',
        'descripcion',
        'estado',
        'domicilio',
        'longitudDom',
        'latitudDom',
        'duenho_id',
        'mascota_id',
    ];

    //get mascota
    public function mascota(){
        return $this->belongsTo(Mascota::class, 'mascota_id');
    }
}
