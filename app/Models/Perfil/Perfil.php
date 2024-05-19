<?php

namespace App\Models\Perfil;

use App\Models\Permissao\Permissao;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfil';

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class, 'permissao_perfils', 'perfil_id', 'permissao_id');
    }
}
