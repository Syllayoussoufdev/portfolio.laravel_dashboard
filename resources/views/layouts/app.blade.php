<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title', 'Mon Application')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- Lier le CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    </head>
    <body>

    <!-- Inclure la barre de navigation (un partial) -->
    @include('partials.navbar')

    <!-- Zone de contenu principale -->
        @yield('content')
    

    <!-- Inclure le footer (un partial) -->
    @include('partials.footer')

    <!-- Vos scripts JS globaux -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Zone pour les scripts spécifiques à une page -->
    @yield('scripts')

    </body>
</html>