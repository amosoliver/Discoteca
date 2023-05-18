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
<body><header>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.login')}}">Login</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('artista.index')}}">Artistas</a></li>
                            <li><a class="dropdown-item" href="{{route('disco.index')}}">Discos</a></li>
                            <li><a class="dropdown-item" href="{{route('genero.index')}}">Gêneros</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-fluid ">
    @yield('main')
    </div>
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
