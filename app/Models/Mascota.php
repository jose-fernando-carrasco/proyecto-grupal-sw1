<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    public function duenho(){
        return $this->belongsTo(User::class);
    }

    public function alertas(){
        return $this->hasMany(Alertamascota::class);
    }
}
