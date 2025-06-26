@extends('layouts.dashboard')

@section('dashboard-content')
    <h2>Annonces de l’agence : {{ $agence->name }}</h2>

    @if($annonces->isEmpty())
        <p>Aucune annonce publiée pour cette agence.</p>
    @else
        @foreach($annonces as $annonce)
            <div class="card mb-3 p-3">
                <h5>{{ $annonce->titre }}</h5>
                <p>{{ $annonce->description }}</p>
                <p>📍 {{ $annonce->ville }} – 💰 {{ $annonce->prix }} FCFA</p>
                <small>Publié le {{ $annonce->created_at->format('d/m/Y') }}</small>
            </div>
        @endforeach
    @endif
@endsection
