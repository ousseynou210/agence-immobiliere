<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory; // Permet d'utiliser les factories pour créer des annonces fictives dans les tests ou les seeders

   public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['agence_id', 'titre', 'description', 'ville', 'prix'];
    
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function commentaires() {
    return $this->hasMany(Commentaire::class);
    }

    public function interets() {
    return $this->hasMany(Interet::class);
    }

    public function auteur() {
    return $this->belongsTo(User::class, 'user_id');
    }


}



