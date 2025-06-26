<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Annonce;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
    'name',
    'email',
    'password',
    'role', // ajoute ceci si tu gères les rôles
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class, "agence_id");
    }

    public function commentaires() {
    return $this->hasMany(Commentaire::class);
    }

}
