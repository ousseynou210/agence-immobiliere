<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interet; // 👉 On importe le modèle, pas le contrôleur

class InteretController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'locataire_id' => 'required|exists:users,id',
            'annonce_id' => 'required|exists:annonces,id',
        ]);

        $interet = Interet::create($request->all()); // 👉 Utilisation correcte du modèle

        return response()->json($interet, 201);
    }
}
