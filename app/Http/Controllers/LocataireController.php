<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocataireController // Ajout de la classe
{
    public function dashboard()
    {
        $user = Auth::user();
        $commentaires = $user->commentaires;
        $interets = $user->interets;
        return view('locataire.dashboard', compact('user', 'commentaires', 'interets'));
    }
}