<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'type_utilisateur', 'phone', 'description', 'adresse'];

    /**
     * Si l'utilisateur est une agence, il peut publier des annonces
     */
    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'agence_id');
    }

    /**
     * Si l'utilisateur est un locataire, il peut commenter des annonces
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'locataire_id');
    }

    /**
     * Si l'utilisateur est un locataire, il peut marquer son intérêt pour des annonces
     */
    public function interets()
    {
        return $this->hasMany(Interet::class, 'locataire_id');
    }

    /**
     * Si l'utilisateur est un bailleur, il peut contacter des agences
     */
    public function contactsEnvoyesParBailleur()
    {
        return $this->hasMany(ContactBailleurAgence::class, 'bailleur_id');
    }

    /**
     * Si l'utilisateur est un locataire, il peut contacter des agences
     */
    public function contactsEnvoyesParLocataire()
    {
        return $this->hasMany(ContactLocataireAgence::class, 'locataire_id');
    }
}
