<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\InteretController;
use App\Http\Controllers\BailleurController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

//Page d'inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4',
        'role' => 'required|in:agence,bailleur,locataire',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'role' => $request->role,
        'password' => Hash::make($validated['password']),
   ]);

    return redirect()->route('login')->with('success', 'Compte créé avec succès.');
});

//Page de connexion
Route::get('/login', function () {  
  return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $role = Auth::user()->role;

    return match ($role) {
        'agence' => redirect()->route('agence.dashboard'),
        'bailleur' => redirect()->route('bailleur.dashboard'),
        'locataire' => redirect()->route('locataire.dashboard'),
        default => redirect('/dashboard')
    };
    }


    return back()->withErrors([
        'email' => 'Identifiants incorrects.',
    ]);
});

// Dashboard commun
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Dashboards spécifiques
Route::get('/agence', [AgenceController::class, 'index'])->name('agence.dashboard');
Route::get('/bailleur', [BailleurController::class, 'index'])->name('bailleur.dashboard');
Route::get('/locataire', [LocataireController::class, 'dashboard'])->name('locataire.dashboard'); // 🔧 corrigé ici

// Annonces pour agences

    Route::get('/agence/creer', [AgenceController::class, 'create'])->name('annonce-create.dashboard');
    Route::post('/agence', [AgenceController::class, 'store'])->name('annonce-store.dashboard');


// Bailleurs : voir annonces et contacter
Route::get('/bailleur/agence/{id}/annonces', [BailleurController::class, 'showAnnonces'])->name('showannonces.dashboard');
Route::get('/bailleur/agence/{id}/contact', [BailleurController::class, 'contactForm'])->name('contactagence.dashboard');
Route::post('/bailleur/agence/{id}/contact', [BailleurController::class, 'sendContact'])->name('sendcontact.dashboard');

// Commentaires et intérêt (locataires)
Route::post('/commentaire/{annonce}', [CommentaireController::class, 'store'])->name('commentaire.store');
Route::post('/interet/{annonce}', [InteretController::class, 'store'])->name('interet.store');


// Voir toutes les annonces en tant que locataire
Route::get('/locataire', [LocataireController::class, 'dashboard'])->name('locataire.dashboard');

