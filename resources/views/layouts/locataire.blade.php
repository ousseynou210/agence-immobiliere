<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Espace Locataire')</title>
</head>
<body>
    <header>
        <h2>Tableau de bord - Locataire</h2>
        <nav>
            <a href="/locataire/dashboard">Accueil</a> |
            <a href="/locataire/annonces">Annonces</a> |
            <a href="/logout">Déconnexion</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
