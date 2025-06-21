@extends('layouts.agence')

@section('title', 'Créer une annonce')

@section('content')
    <div class="container">
        <h3>Nouvelle annonce</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('annonces.store') }}">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" name="ville" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" name="prix" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Publier l'annonce</button>
        </form>
    </div>
@endsection
