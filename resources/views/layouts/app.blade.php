<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Home' }} | {{ config('app.name') }}</title>
    <meta name="description" content="TFA6 POS - the Laravel POS backed by a real database: migrations, seeders and Eloquent models (IT0049).">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pos.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
    @include('partials.nav')

    <main class="container page">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <div class="mvc-trace" aria-label="How this page was served">
                <span class="trace-label">Served by</span>
                <code>{{ request()->method() }} /{{ ltrim(request()->path(), '/') }}</code>
                <span class="trace-arrow" aria-hidden="true">&rarr;</span>
                <code>{{ class_basename(Route::currentRouteAction() ?? 'Closure') }}</code>
                <span class="trace-arrow" aria-hidden="true">&rarr;</span>
                <code>@yield('view_file')</code>
            </div>
            <p class="footer-meta">IT0049 Web System Technologies &middot; TFA6 &middot; Kyle Pingol (TC31)</p>
        </div>
    </footer>
</body>
</html>
