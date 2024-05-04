<?php

namespace App\Models\Carro;

use App\Models\Locacao\Locacao;
use App\Models\Modelo\Modelo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id',
        'placa',
        'disponivel',
        'km',
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function locacao()
    {
        return $this->belongsTo(Locacao::class, 'carro_id', 'id');
    }
}
