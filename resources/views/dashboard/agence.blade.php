@extends('layouts.agence')

@section('title', 'Dashboard Agence')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Bienvenue sur votre espace Agence</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('annonces.ajouter') }}" class="btn btn-success mb-4">+ Publier une annonce</a>

    <h4>Mes annonces publiées</h4>

    @if($annonces->isEmpty())
        <div class="alert alert-info">
            Vous n'avez publié aucune annonce pour le moment.
        </div>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Ville</th>
                    <th>Prix (€)</th>
                    <th>Créée le</th>
                </tr>
            </thead>
            <tbody>
                @foreach($annonces as $annonce)
                    <tr>
                        <td>{{ $annonce->titre }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($annonce->description, 100) }}</td>
                        <td>{{ $annonce->ville }}</td>
                        <td>{{ $annonce->prix }}</td>
                        <td>{{ $annonce->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
