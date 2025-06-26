@extends('layouts.dashboard')

@section('dashboard-content')
    <h2>Bienvenue dans le tableau de bord</h2>
    <p>Connecté en tant que {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

    <hr>

    <h4>Choisir une vue :</h4>

    <form method="GET" action="{{ route('dashboard') }}">
        <select name="section" onchange="this.form.submit()" class="form-select w-25">
            <option value="">-- Choisir une section --</option>
            <option value="agence" {{ request('section') == 'agence' ? 'selected' : '' }}>Agence</option>
            <option value="bailleur" {{ request('section') == 'bailleur' ? 'selected' : '' }}>Bailleur</option>
            <option value="locataire" {{ request('section') == 'locataire' ? 'selected' : '' }}>Locataire</option>
        </select>
    </form>

    <div class="mt-4">
        @if(request('section') == 'agence')
            @include('dashboard.agence')
        @elseif(request('section') == 'bailleur')
            @include('dashboard.bailleur')
        @elseif(request('section') == 'locataire')
            @include('dashboard.locataire')
        @else
            <p>Veuillez choisir une section.</p>
        @endif
    </div>
@endsection
