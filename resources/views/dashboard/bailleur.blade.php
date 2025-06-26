@extends('layouts.dashboard')

@section('dashboard-content')
    <h2>Liste des agences</h2>

    @if($agences->count())
        <div class="row">
            @foreach($agences as $agence)
                <div class="col-md-4">
                    <div class="card mb-3 p-3">
                        <h5>{{ $agence->name }}</h5>
                        <p>📧 {{ $agence->email }}</p>
                        <!-- Tu peux ajouter ici un bouton pour voir ses annonces -->
                        <a href="{{ route('showannonces.dashboard', $agence->id) }}" class="btn btn-outline-primary">
                            Voir les annonces
                        </a>
                        <a href="{{ route('contactagence.dashboard', $agence->id) }}" class="btn btn-sm btn-outline-success mb-3">
                            📩 Contacter cette agence
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucune agence disponible.</p>
    @endif
@endsection
