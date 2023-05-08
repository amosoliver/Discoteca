<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exemplo de Sidebar Bootstrap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <style>
        body {
            height: 100%;
            overflow-y: auto;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            background-color: #343a40;
            padding-top: 3.5rem;
        }

        .sidebar img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .sidebar-menu {
            margin-top: 2rem;
            padding-left: 0;
        }

        .sidebar-menu li {
            border-left: 4px solid transparent;
        }

        .sidebar-menu li:hover {
            border-left-color: white;
        }

        .sidebar-menu li a {
            color: white;
        }

        .sidebar-menu li.active {
            border-left-color: white;
            font-weight: bold;
        }

        .main-content {
            margin-left: 16.5rem;
            padding-top: 3.5rem;
        }
    </style>
</head>
<body>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <img src="https://via.placeholder.com/300x200.png?text=Imagem+do+Sidebar" alt="Imagem do Sidebar">

    <ul class="sidebar-menu">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Item 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Item 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Item 3</a>
        </li>
    </ul>
</nav>

<div class="main-content">
    <div class="pt-3 pb-2 mb-3">
        <h1>Conteúdo Principal</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Este é um exemplo básico de como criar um sidebar utilizando o Bootstrap 5.</p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>

