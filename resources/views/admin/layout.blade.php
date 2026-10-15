<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titulo')</title>

    <!-- Materialize CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- DROPDOWN DO USUÁRIO -->
    <ul id="dropdown2" class="dropdown-content">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('login.logout') }}">
                Sair
            </a>
        </li>
    </ul>

    <!-- NAVBAR -->
    <nav class="red">
        <div class="nav-wrapper container">

            <!-- LOGOTIPO -->
            <a href="{{ route('admin.dashboard') }}" class="brand-logo center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </a>

            <ul class="right">

                <!-- TELA CHEIA -->
                <li class="hide-on-med-and-down">
                    <a href="#!" onclick="fullScreen()">
                        <i class="material-icons">settings_overscan</i>
                    </a>
                </li>

                <!-- USUÁRIO AUTENTICADO -->
                @auth
                    <li>
                        <a href="#!"
                           class="dropdown-trigger"
                           data-target="dropdown2">
                            Olá, {{ auth()->user()->name }}
                            <i class="material-icons right">expand_more</i>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login.form') }}">
                            Login
                        </a>
                    </li>
                @endauth

            </ul>

            <!-- BOTÃO DO MENU LATERAL -->
            <a href="#"
               data-target="slide-out"
               class="sidenav-trigger left show-on-large">
                <i class="material-icons">menu</i>
            </a>

        </div>
    </nav>

    <!-- MENU LATERAL -->
    <ul id="slide-out" class="sidenav">

        <!-- DADOS DO USUÁRIO -->
        <li>
            <div class="user-view">

                <div class="background red">
                    <img src="{{ asset('img/office.jpg') }}"
                         alt="Fundo do menu"
                         style="opacity: 0.5">
                </div>

                <a href="#user">
                    <img class="circle"
                         src="{{ asset('img/user.jpg') }}"
                         alt="Foto do usuário">
                </a>

                @auth
                    <a href="#name">
                        <span class="white-text name">
                            {{ auth()->user()->name }}
                        </span>
                    </a>

                    <a href="#email">
                        <span class="white-text email">
                            {{ auth()->user()->email }}
                        </span>
                    </a>
                @else
                    <a href="{{ route('login.form') }}">
                        <span class="white-text name">
                            Visitante
                        </span>
                    </a>
                @endauth

            </div>
        </li>

        <!-- LINKS DO MENU -->
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="material-icons">dashboard</i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.produtos') }}">
                <i class="material-icons">playlist_add_circle</i>
                Produtos
            </a>
        </li>

        <li>
            <a href="#!">
                <i class="material-icons">shopping_cart</i>
                Pedidos
            </a>
        </li>

        <li>
            <a href="#!">
                <i class="material-icons">bookmarks</i>
                Categorias
            </a>
        </li>

        <li>
            <a href="#!">
                <i class="material-icons">people</i>
                Usuários
            </a>
        </li>

        @auth
            <li>
                <a href="{{ route('login.logout') }}">
                    <i class="material-icons">exit_to_app</i>
                    Sair
                </a>
            </li>
        @endauth

    </ul>

    <!-- CONTEÚDO DA PÁGINA -->
    <main>
        @yield('conteudo')
    </main>

    <!-- MATERIALIZE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- SCRIPTS PERSONALIZADOS -->
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- INICIALIZAÇÃO DOS MENUS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var modals = document.querySelectorAll('.modal');
        M.Modal.init(modals);

        // Inicializar os menus dropdown
        var dropdowns = document.querySelectorAll('.dropdown-trigger');
        M.Dropdown.init(dropdowns, {
            coverTrigger: false
        });

        // Inicializar o menu lateral
        var sidenavs = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sidenavs);

        // Inicializar os campos select
        var selects = document.querySelectorAll('select');
        M.FormSelect.init(selects);

        // Inicializar botão de ações flutuantes
        var fixedButtons = document.querySelectorAll('.fixed-action-btn');
        M.FloatingActionButton.init(fixedButtons);
    });
       

        // Função para tela cheia
        function fullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else if (document.exitFullscreen) {
                document.exitFullscreen();
            }
        }
    </script>

    <!-- GRÁFICOS -->
    @stack('graficos')

</body>
</html>