<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AgenceController extends Controller
{
   public function index()
    {
        $annonces = Annonce::where('agence_id', Auth::id())->latest()->get();
        return view('dashboard.agence', compact('annonces'));
    }

    public function create()
    {
        return view('dashboard.annonce-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'ville' => 'required|string|max:100',
            'prix' => 'required|numeric|min:0',
            'type_bien' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $annonce = Annonce::create([
            'agence_id' => Auth::id(), // ou 'user_id' si ta table utilise ça
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'ville' => $validated['ville'],
            'prix' => $validated['prix'],
            'type_bien' => $validated['type_bien'],
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $chemin = $image->store('annonces', 'public');
                $annonce->photos()->create(['chemin' => $chemin]);
            }
        }
        return redirect()->route('agence.dashboard')->with('success', 'Annonce créée avec succès.');
    }

   
}
