<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alertamascota extends Model
{
    use HasFactory;
    protected $fillable = ['latitud','longitud','detalle','mascota_id','user_id'];

    public function mascota(){
        return $this->belongsTo(Mascota::class);
    }

}
