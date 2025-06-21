<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->type_utilisateur) {
            case 'bailleur':
                return view('dashboard.bailleur');
            case 'agence':
                return view('dashboard.agence');
            case 'locataire':
                return view('dashboard.locataire');
            default:
                abort(403, 'Rôle inconnu.');
        }
    }
}
