<?php

namespace App\Models\Modelo;

use App\Models\Carro\Carro;
use App\Models\Marca\Marca;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'marca_id',
        'imagem',
        'numero_portas',
        'lugares',
        'air_bag',
        'abs',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function carros()
    {
        return $this->hasMany(Carro::class);
    }
}
