<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Espace Agence')</title>
</head>
<body>
    <header>
        <h2>Tableau de bord - Agence</h2>
        <nav>
            <a href="/agence/dashboard">Accueil</a> |
            <a href="/agence/annonces">Mes annonces</a> |
            <a href="/agence/messages">Messages</a> |
            <a href="/logout">Déconnexion</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
