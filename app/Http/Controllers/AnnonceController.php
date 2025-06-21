<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;


class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::with('photos', 'user')->latest()->get();
        return response()->json($annonces);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'agence_id' => 'required|exists:users,id',
        ]);

        $annonce = Annonce::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'agence_id' => $request->agence_id,
        ]);

        return response()->json($annonce, 201);
    }
}

