<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory; // Permet d'utiliser les factories pour créer des annonces fictives dans les tests ou les seeders

    // Déclare les colonnes qui peuvent être remplies automatiquement avec create() ou update()
    protected $fillable = [
        'titre',            // Titre de l’annonce (ex: "Appartement à louer")
        'description',      // Description textuelle
        'type_bien',        // Type de bien (maison, studio, chambre…)
        'surface',          // Surface en m²
        'nombre_pieces',    // Nombre de pièces
        'loyer',            // Loyer mensuel
        'adresse',          // Adresse du bien
        'ville',            // Ville du bien
        'disponible',       // true/false selon si le bien est encore libre
        'agence_id',        // Clé étrangère : agence qui a publié l’annonce (utilisateur de type agence)
        'bailleur_id'       // Clé étrangère : bailleur lié à l’annonce si besoin (optionnel selon ton projet)
    ];

    /**
     * Relation avec l'utilisateur (type agence)
     * Une annonce appartient à une agence
     */
    public function agence()
    {
        return $this->belongsTo(User::class, 'agence_id');
    }

    /**
     * Relation avec les commentaires
     * Une annonce peut avoir plusieurs commentaires laissés par des locataires
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    /**
     * Relation avec les marques d’intérêt
     * Une annonce peut recevoir plusieurs marques d’intérêt (équivalent à “j’aime” d’un locataire)
     */
    public function interets()
    {
        return $this->hasMany(Interet::class);
    }

    /**
     * Relation avec les photos
     * Une annonce peut avoir plusieurs photos (uploadées par l’agence)
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
