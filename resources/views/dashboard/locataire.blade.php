@extends('layouts.dashboard')

@section('dashboard-content')
    <h2>📢 Annonces disponibles</h2>

    <div class="row">
        @foreach($annonces as $annonce)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $annonce->titre }}</h5>
                        <p class="card-text">{{ $annonce->description }}</p>
                        <p class="text-muted">📍 {{ $annonce->ville }} – 💰 {{ number_format($annonce->prix, 0, ',', ' ') }} FCFA</p>
                        <p class="small">🕒 Publiée le {{ $annonce->created_at->format('d/m/Y') }}</p>

                        {{-- Bouton intérêt --}}
                        <form action="{{ route('interet.store', $annonce->id) }}" method="POST" class="mb-2">
                            @csrf
                            <button type="submit" class="btn btn-outline-success btn-sm">👍 Je suis intéressé(e)</button>
                        </form>

                        {{-- Commentaires --}}
                        <h6>💬 Commentaires</h6>
                        @foreach ($annonce->commentaires as $commentaire)
                            <p><strong>{{ $commentaire->locataire->name ?? 'Utilisateur' }} :</strong> {{ $commentaire->contenu }}</p>
                        @endforeach

                        {{-- Formulaire de commentaire --}}
                        <form action="{{ route('commentaire.store', $annonce->id) }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <textarea name="contenu" class="form-control" rows="2" placeholder="Laissez un commentaire..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Envoyer 💬</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
