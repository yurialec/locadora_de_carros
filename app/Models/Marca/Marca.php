<?php

namespace App\Models\Marca;

use App\Models\Modelo\Modelo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];

    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }
}
