@php
    $role = Auth::user()->role ?? 'visiteur';
@endphp

<aside class="bg-light p-4 vh-100" style="min-width: 220px;">
    <h5 class="fw-bold">Navigation</h5>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="/annonces">Annonces</a></li>
        <li class="nav-item"><a class="nav-link" href="/messages">Messages</a></li>
    </ul>
</aside>

