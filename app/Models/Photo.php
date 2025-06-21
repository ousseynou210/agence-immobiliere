<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory; // Permet d’utiliser des factories pour générer des photos fictives lors des tests ou du seeding

    // Déclare les champs que l'on peut remplir automatiquement
    protected $fillable = ['annonce_id', 'chemin'];

    /**
     * Relation : une photo appartient à une seule annonce
     * Cela permet de récupérer l’annonce liée à une photo
     * Exemple : $photo->annonce->titre
     */
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}

