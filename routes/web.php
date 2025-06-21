<?php
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\InteretController;
use App\Http\Controllers\ContactBailleurAgenceController;
use App\Http\Controllers\ContactLocataireAgenceController;
use App\Http\Controllers\PhotoController;
use App\Models\Annonce;

// Route publique
Route::get('/bailleur', function () {
    return view('dashboard.bailleur');
});
Route::get('/agence', function () {
    return view('dashboard.agence');
});
Route::get('/locataire', function () {
    return view('dashboard.locataire');
});
// Route de connexion
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $role = Auth::user()->role;

        // Redirection selon le rôle
        if ($role === 'bailleur') {
            return redirect('/bailleur');
        } elseif ($role === 'locataire') {
            return redirect('/locataire');
        } elseif ($role === 'agence') {
            return redirect('/agence');
        } else {
            return redirect('/'); // fallback
        }
    }

    return back()->withErrors([
        'email' => 'Identifiants incorrects.',
    ]);
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});

// Route inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4',
        'role' => 'required|in:bailleur,locataire,agence',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Compte créé avec succès ! Connectez-vous.');
});


// Route après connexion
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Afficher le formulaire
Route::get('/agence/annonces/ajouter', function () {
    return view('annonces.ajouter');
})->name('annonces.ajouter');

// Enregistrer une annonce
Route::post('/agence/annonces/ajouter', function (Request $request) {
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'ville' => 'required|string',
        'prix' => 'required|numeric',
    ]);

    Annonce::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'ville' => $request->ville,
        'prix' => $request->prix,
        'agence_id' => Auth::id(),
    ]);

    return redirect('/agence')->with('success', 'Annonce publiée avec succès !');
})->name('annonces.store');
















































// =============================
//        ROUTES PAR RÔLE
// =============================

// ----- AGENCE -----
Route::middleware(['auth', 'role:agence'])->group(function () {
    Route::get('/agence/dashboard', [DashboardController::class, 'index']);
    
    // Gestion des annonces
    Route::post('/annonces', [AnnonceController::class, 'store']);
    Route::get('/annonces', [AnnonceController::class, 'index']);

    // Ajout de photo à une annonce
    Route::post('/photos', [PhotoController::class, 'store']);
});

// ----- LOCATAIRE -----
Route::middleware(['auth', 'role:locataire'])->group(function () {
    Route::get('/locataire/dashboard', [DashboardController::class, 'index']);

    // Poster un commentaire sur une annonce
    Route::post('/commentaires', [CommentaireController::class, 'store']);

    // Montrer son intérêt pour une annonce
    Route::post('/interets', [InteretController::class, 'store']);

    // Contacter une agence
    Route::post('/contact-locataire', [ContactLocataireAgenceController::class, 'store']);
});

// ----- BAILLEUR -----
Route::middleware(['auth', 'role:bailleur'])->group(function () {
    Route::get('/bailleur/dashboard', [DashboardController::class, 'index']);

    // Contacter une agence
    Route::post('/contact-bailleur', [ContactBailleurAgenceController::class, 'store']);
});
