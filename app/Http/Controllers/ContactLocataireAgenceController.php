<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactLocataireAgence;

class ContactLocataireAgenceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'locataire_id' => 'required|exists:users,id',
            'agence_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $contact = ContactLocataireAgence::create([
            'locataire_id' => $request->locataire_id,
            'agence_id' => $request->agence_id,
            'message' => $request->message,
            'contacte_le' => now(),
        ]);

        return response()->json($contact, 201);
    }
}

