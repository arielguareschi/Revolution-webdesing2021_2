<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>
<body>
    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a href="#" class="py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            </a>
            <a href="#" class="py-2 d-none d-md-inline-block">Notícias</a>
            <a href="#" class="py-2 d-none d-md-inline-block">Fotos</a>
            <a href="#" class="py-2 d-none d-md-inline-block">Links Úteis</a>
            <a href="#" class="py-2 d-none d-md-inline-block">Mais Infos</a>
            <a href="{{ url('contato') }}" class="py-2 d-none d-md-inline-block">Contato</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                <small class="d-block mb-3 text-muted">&copy 2021</small>
            </div>
            <div class="col-6 col-md">
                <h5>Notícias</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="#" class="text-muted">Todas</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Fotos</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="#" class="text-muted">Todas</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Links Úteis</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="#" class="text-muted">Todas</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Mais Info</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="#" class="text-muted">Todas</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Contato</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="#" class="text-muted">Todas</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Acesso Restrito</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="{{ url('home') }}" class="text-muted">Acessar</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>
