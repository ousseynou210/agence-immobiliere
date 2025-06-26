@extends('layouts.dashboard')

@section('dashboard-content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
            <h2 class="mb-3">🏢 Tableau de bord – Agence</h2>
            <a href="{{ route('annonce-create.dashboard') }}" class="btn btn-success">
                ➕ Nouvelle annonce
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($annonces->isEmpty())
        <div class="alert alert-info text-center">
            Vous n’avez publié aucune annonce pour le moment.
        </div>
    @else
        <div class="row g-4">
            @foreach($annonces as $annonce)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        @if($annonce->photo)
                            <img src="{{ asset('/adminlte/assets/img/maison.jpg' . $annonce->photo) }}" 
                                 class="card-img-top rounded-top-4" 
                                 alt="Photo de l'annonce"
                                 style="height: 180px; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $annonce->titre }}</h5>
                            <p class="card-text text-truncate">{{ $annonce->description }}</p>
                            <p class="text-muted small">
                                📍 {{ $annonce->ville ?? 'Non spécifiée' }}<br>
                                💰 {{ number_format($annonce->prix, 0, ',', ' ') }} FCFA
                            </p>
                           
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
