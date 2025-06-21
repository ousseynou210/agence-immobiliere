<!-- filepath: c:\xampp\htdocs\plateforme\resources\views\layouts\bailleur.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    @include('components.navbar')

    <div class="d-flex">
        @include('components.sidebar')

        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>

    @include('components.footer')
</body>
</html>