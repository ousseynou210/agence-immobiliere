@extends('layouts.dashboard')

@section('dashboard-content')
    <h3>Contacter l’agence : {{ $agence->name }}</h3>

    <form action="{{ route('sendcontact.dashboard', $agence->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection
