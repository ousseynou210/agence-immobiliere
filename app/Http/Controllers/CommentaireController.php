<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'locataire_id' => 'required|exists:users,id',
            'annonce_id' => 'required|exists:annonces,id',
            'contenu' => 'required|string',
        ]);

        $commentaire =  Commentaire::create($request->all());

        return response()->json($commentaire, 201);
    }
}

