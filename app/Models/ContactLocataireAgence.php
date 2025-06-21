<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactLocataireAgence extends Model
{
    use HasFactory; // Permet de générer facilement des exemples de contacts pour les tests

    // Nom explicite de la table car il ne suit pas la convention Laravel (normalement au pluriel)
    protected $table = 'contact_locataire_agence';

    // Champs que l’on autorise à remplir automatiquement
    protected $fillable = ['locataire_id', 'agence_id', 'message', 'contacte_le'];

    /**
     * Relation : un contact est envoyé par un locataire
     * Permet de retrouver l’auteur du message (utilisateur de type locataire)
     * Exemple : $contact->locataire->name
     */
    public function locataire()
    {
        return $this->belongsTo(User::class, 'locataire_id');
    }

    /**
     * Relation : un contact est adressé à une agence
     * Permet de retrouver l’agence contactée
     * Exemple : $contact->agence->name
     */
    public function agence()
    {
        return $this->belongsTo(User::class, 'agence_id');
    }
}

