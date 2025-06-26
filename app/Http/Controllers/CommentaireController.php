<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
   public function store(Request $request, $annonceId) {
    $request->validate([
        'contenu' => 'required|string|max:1000',
    ]);

    Commentaire::create([
        'annonce_id' => $annonceId,
        'contenu' => $request->contenu,
        'locataire_id' => Auth::id(), // <-- IMPORTANT !
    ]);

    return back()->with('success', 'Commentaire ajouté');
    }
}

