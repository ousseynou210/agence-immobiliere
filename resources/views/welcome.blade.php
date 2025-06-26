<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue - Plateforme de location</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('/adminlte/assets/img/immobilier.jpeg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 0;
            color: white;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .welcome-box {
            position: relative;
            z-index: 2;
            max-width: 450px;
            padding: 40px;
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        h1, p {
            color: white;
        }

        .btn-lg {
            font-size: 1.1rem;
            padding: 12px;
        }

        .auth-links {
            margin-top: 30px;
        }

        .auth-links a {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="overlay"></div>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; position: relative;">
        <div class="welcome-box text-center shadow">
            <h1 class="mb-4">Bienvenue sur la plateforme</h1>
            <p class="mb-4">Connectez-vous ou créez un compte pour continuer :</p>

            <div class="d-grid gap-3 auth-links">
                <a href="{{ route('login') }}" class="btn btn-light btn-lg text-dark">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">S'inscrire</a>
            </div>
        </div>
    </div>

</body>
</html>
