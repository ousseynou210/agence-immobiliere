<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Plateforme')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('components.navbar')

    <div class="container-fluid">
        @yield('content')
    </div>

    @include('components.footer')

</body>
</html>
