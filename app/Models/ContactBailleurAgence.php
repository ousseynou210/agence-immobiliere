<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactBailleurAgence extends Model
{
    use HasFactory; // Active les factories pour ce modèle (utile pour les tests ou le seeding)

    // Spécifie manuellement le nom de la table si elle ne suit pas la convention Laravel
    protected $table = 'contact_bailleur_agence';

    // Déclare les champs qu’on peut remplir automatiquement
    protected $fillable = ['bailleur_id', 'agence_id', 'message', 'contacte_le'];

    /**
     * Relation : le contact appartient à un bailleur (utilisateur de type "bailleur")
     * Permet d'accéder aux infos du bailleur depuis un message
     * Exemple : $contact->bailleur->name
     */
    public function bailleur()
    {
        return $this->belongsTo(User::class, 'bailleur_id');
    }

    /**
     * Relation : le contact est adressé à une agence (utilisateur de type "agence")
     * Permet d’accéder aux infos de l’agence contactée
     * Exemple : $contact->agence->name
     */
    public function agence()
    {
        return $this->belongsTo(User::class, 'agence_id');
    }
}

