<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BailleurController extends Controller
{
   public function index()
    {
    // Récupère uniquement les utilisateurs qui ont publié au moins une annonce
    $agences = User::whereHas('annonces')->get();

       return view('dashboard.bailleur', compact('agences'));
   }

   public function showAnnonces($id)
   {
       $agence = User::findOrFail($id);
       $annonces = $agence->annonces;

       return view('dashboard.showannonces', compact('agence', 'annonces'));
   }
   public function contactForm($id)
{
    $agence = \App\Models\User::findOrFail($id);
    return view('dashboard.contactagence', compact('agence'));
}

public function sendContact(Request $request, $id)
{
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    $agence = \App\Models\User::findOrFail($id);

    // Simulation de l'envoi du message (à adapter plus tard si messagerie interne ou mail)
    // Par exemple ici on enregistre dans une table ou on envoie un mail
    // Mail::to($agence->email)->send(new ContactAgence(...));

    return redirect()->route('showannonces.dashboard', $id)
                     ->with('success', 'Message envoyé à l’agence avec succès.');
}
}
