<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        "raza_id", "nombre", "color", "edad", "duenho_id", "pedigree", "imagen"
    ];

    public function razaMascota(): BelongsTo
    {
        return $this->belongsTo(Raza::class, 'raza_id');
    }

    public function duenho(){
        return $this->belongsTo(User::class);
    }

    public function alertas(){
        return $this->hasMany(Alertamascota::class);
    }
}
