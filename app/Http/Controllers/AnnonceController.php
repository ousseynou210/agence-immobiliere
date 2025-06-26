<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnnonceController extends Controller
{

    public function index()
    {
        $annonces = Annonce::where('user_id', Auth::id())->latest()->get();
        return view('dashboard.agence', compact('annonces'));
    }
 public function store(Request $request)
    {
    $request->validate([
        'titre' => 'required|string',
        'description' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Enregistrement de l'image
    $path = $request->file('photo')->store('annonces', 'public');

    Annonce::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'photo' => "/adminlte/assets/img/maison.jpg", // on enregistre juste le chemin
    ]);

    return redirect()->route('annonce.index')->with('success', 'Annonce ajoutée !');
    }


}