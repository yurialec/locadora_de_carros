<?php

namespace App\Models;

use App\Models\Perfil\Perfil;
use App\Models\Permissao\Permissao;
use App\Models\PermissaoPerfil\PermissaoPerfil;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $with = ['perfil', 'permissoes'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function permissoes()
    {
        return $this->hasManyThrough(
            Permissao::class,
            PermissaoPerfil::class,
            'perfil_id',
            'id',
            'perfil_id',
            'permissao_id'
        );
    }

    public function hasPermissions(User $user, string $permissionName): bool
    {
        return $user->permissoes()->where('nome', $permissionName)->exists();
    }
}
