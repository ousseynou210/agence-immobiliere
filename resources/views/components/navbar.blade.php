<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ route('dashboard') }}">📦 Plateforme</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        @auth
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                   
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">🏠 Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">👤 Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        🚪 Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        @endauth
    </div>
</nav>
