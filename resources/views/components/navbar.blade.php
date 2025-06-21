@php
    $role = Auth::user()->role ?? 'visiteur';
@endphp
@if (Auth::check())
    <p>Connecté en tant que {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>
@endif

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <ul class="navbar-nav d-flex flex-row gap-3">
        <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="/profile">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="/logout">Déconnexion</a></li>
    </ul>
</nav>
