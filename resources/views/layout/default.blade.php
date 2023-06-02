<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Discoteca</title>
    <link rel="icon" href="resources/img/istockphoto-1367877060-612x612.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    @vite(['resources/js/app.js'])
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="resources/img/istockphoto-1367877060-612x612.jpg">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    @guest
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('artista.index') }}">Artistas</a></li>
                                <li><a class="dropdown-item" href="{{ route('disco.index') }}">Discos</a></li>
                                <li><a class="dropdown-item" href="{{ route('genero.index') }}">Gêneros</a></li>
                            </ul>
                        </li>
                    @endguest
                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-item" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                     fill="currentColor" class="bi bi-person text-light" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                            </a>

                            @guest
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" aria-current="page"
                                           href="{{ route('user.login') }}">Login</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="dropdown-menu">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                             fill="currentColor" class="bi bi-person text-light" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                        </svg>


                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('user.logout')}}">Sair</a></li>
                                </ul>
                    @endguest
                </ul>
            </div>
            </li>
            </ul>
        </div>
        </div>
    </nav>
</header>

<main>

        @if(session('success'))
            <div class="alert alert-success col-md-3">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"width="15" height="15"><use xlink:href="#check-circle-fill"/></svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:" width="15" height="15"><use xlink:href="#exclamation-triangle-fill"/></svg>
                {{ session('error') }}
            </div>
        @endif
        @yield('main')

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

</main>

<nav class="navbar navbar-dark bg-dark text-white fixed-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                © 2023 Direitos Reservados:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
        </div>
    </div>
</nav>

</body>

</html>
