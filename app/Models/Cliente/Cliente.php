<?php

namespace App\Models\Cliente;

use App\Models\Locacao\Locacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function locacoes()
    {
        return $this->hasMany(Locacao::class, 'cliente_id', 'id');
    }
}
