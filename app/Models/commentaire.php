<?php

namespace App\Models;

use App\Models\Annonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory; // Permet d’utiliser les factories pour générer de faux commentaires en test ou en seed

    // Déclare les champs que l’on peut remplir automatiquement lors de la création ou modification
    protected $fillable = ['contenu', 'annonce_id', 'locataire_id'];

    /**
     * Relation : un commentaire appartient à une annonce
     * Permet d’accéder à l’annonce concernée depuis un commentaire
     * Exemple : $commentaire->annonce
     */
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }

    /**
     * Relation : un commentaire appartient à un utilisateur de type locataire
     * Permet de retrouver l’auteur du commentaire
     * Exemple : $commentaire->locataire->name
     */
    public function locataire()
    {
        return $this->belongsTo(User::class, 'locataire_id');
    }
}
