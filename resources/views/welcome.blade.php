<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Audit-Helper</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('audits') }}">Audit-Helper</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('audits') }}">Главная</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
            <form class="d-flex ms-2">
                <a href="{{ route('logout') }}" class="btn btn-outline-secondary">Выход</a>
            </form>
        </div>
    </div>
</nav>
<div class="app-wrapper">
    @yield('content')
</div>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
