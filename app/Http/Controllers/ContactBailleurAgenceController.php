<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactBailleurAgence;

class ContactBailleurAgenceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bailleur_id' => 'required|exists:users,id',
            'agence_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $contact = ContactBailleurAgence::create([
            'bailleur_id' => $request->bailleur_id,
            'agence_id' => $request->agence_id,
            'message' => $request->message,
            'contacte_le' => now(),
        ]);

        return response()->json($contact, 201);
    }
}
