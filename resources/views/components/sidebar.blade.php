<div class="bg-light border-end vh-100 p-3" style="min-width: 200px;">
    <h5 class="mb-4">Navigation</h5>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') && !request('section') ? 'active fw-bold' : '' }}">
                🏠 Tableau de bord
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('agence.dashboard') }}" class="nav-link {{ request('section') == 'agence' ? 'active fw-bold' : '' }}">
                🏢  Agence
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('bailleur.dashboard') }}" class="nav-link {{ request('section') == 'bailleur' ? 'active fw-bold' : '' }}">
                🧑‍💼  Bailleur
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('locataire.dashboard') }}" class="nav-link {{ request('section') == 'locataire' ? 'active fw-bold' : '' }}">
                🏠  Locataire
            </a>
        </li>

        <li class="nav-item mt-3">
            <a href="{{ route('logout') }}" class="nav-link text-danger"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                🚪 Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
