<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Amigo Fiel</title>
    <style>
        body {
            background-color: #d2e6f5; /* Cor de fundo da página */
        }
        .navbar {
            background-color: #0592EB; /* Cor da barra de navegação */
        }
        .navbar-brand {
            color: white; /* Cor do texto da barra de navegação */
        }
        .nav-link {
            color: white; /* Cor do texto do link Entrar */
        }
        .nav-link:hover {
            color: black; /* Cor do texto ao passar o mouse */
        }
        .btn-register {
            background-color: #0486C9; /* Cor um pouco mais escura */
            color: white; /* Cor do texto do botão */
        }
        .btn-register:hover {
            background-color: #036DAA; /* Cor azul mais escura ao passar o mouse */
        }
        .btn-logout {
            background-color: #dc3545; /* Cor do botão de deslogar */
            color: white; /* Cor do texto do botão */
        }
        .btn-logout:hover {
            background-color: #c82333; /* Cor mais escura ao passar o mouse */
        }
        .logo {
            border-radius: 50%; /* Arredondar a logo */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ url('storage/page/logo.jpg') }}" alt="Amigo Fiel" width="75" height="75" class="logo me-2">
                <span>Amigo Fiel</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    
                    @if (Auth::check())
                        @if(auth()->user()->is_admin == 1)
                            <li class="nav-item" id="find-friend-link">
                                <a href="{{ route('animals.create') }}" class="nav-link ms-2">Cadastrar Animal</a>
                            </li>
                            <li class="nav-item" id="find-friend-link">
                                <a href="{{ route('animals.index') }}" class="nav-link ms-2">Listar Animais</a>
                            </li>
                            <li class="nav-item" id="find-friend-link">
                                <a href="{{ route('solicitacoes.index') }}" class="nav-link ms-2">Listar Solicitações</a>
                            </li>
                        @else
                            <li class="nav-item" id="find-friend-link">
                                <a href="{{ route('animals.index') }}" class="nav-link ms-2">Encontrar Amigo</a>
                            </li>
                        @endif
                        <li class="nav-item" id="profile-link">
                            <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-register ms-2">Ver Perfil</a>
                        </li>
                        <li class="nav-item" id="logout-link">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-logout ms-2">Deslogar</button>
                            </form>
                        </li>
                    @else 
                        <li class="nav-item" id="login-link">
                            <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                        </li>
                        <li class="nav-item" id="register-link">
                            <a href="{{ route('users.create') }}" class="btn btn-register ms-2">Registrar</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
<div class="container" style="margin-top: 70px;">
    <main>
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
