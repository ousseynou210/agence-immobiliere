@extends('layouts.dashboard')

@section('dashboard-content')
    <h2>Créer une nouvelle annonce</h2>

    <form action="{{ route('annonce-store.dashboard') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (FCFA)</label>
            <input type="number" name="prix" id="prix" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="type_bien" class="form-label">Type de bien</label>
            <select name="type_bien" id="type_bien" class="form-select" required>
                <option value="">-- Choisissez --</option>
                <option value="Appartement">Appartement</option>
                <option value="Maison">Maison</option>
                <option value="Studio">Studio</option>
                <option value="Terrain">Terrain</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Images</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>

        <button type="submit" class="btn btn-success">📤 Publier l’annonce</button>
    </form>
@endsection
