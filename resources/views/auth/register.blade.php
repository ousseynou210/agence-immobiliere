<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Plateforme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 450px;">
        <h3 class="text-center mb-4">Créer un compte</h3>
        <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom complet</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <select name="role" class="form-select" required>
                    <option value="bailleur">Bailleur</option>
                    <option value="locataire">Locataire</option>
                    <option value="agence">Agence</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">S'inscrire</button>
        </form>
    </div>
</body>
</html>
