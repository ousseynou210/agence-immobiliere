<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Commentaire;
use App\Models\Interet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LocataireController // Ajout de la classe
{
    public function dashboard()
    {
        $user = \App\Models\User::find(1); // Remplacer par un utilisateur existant
        $commentaires = \App\Models\Commentaire::with('locataire')->get();
        $interets = $user?->interets ?? collect(); // évite l'erreur si null
        $annonces = \App\Models\Annonce::with('user', 'commentaires.user')->latest()->get();

        return view('dashboard.locataire', compact('user', 'commentaires', 'interets', 'annonces'));
    }
}