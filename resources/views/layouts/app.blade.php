<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Тестовое задание Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" >

    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-expend bg-light navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-l0">
                    <li class="nav-item active">
                        <a href="" class="nav-link menu-link menu-link__active">Главная страница</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link menu-link">Каталог статей</a>
                    </li>
                </ul>
                <a href="https://github.com/artsocode" class="navbar-brand d-flex justify-content-end">
                    <span>@ArtSocode</span> &nbsp <i class="bi bi-github"></i>
                </a>
            </div>
        </nav>

        @yield('hero')
        @yield('content')
        @yield('vue')
    </div>
    </body>
</html>
