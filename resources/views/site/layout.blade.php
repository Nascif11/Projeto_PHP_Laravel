<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    {{-- DROPDOWN --}}
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaM)
            <li><a href="{{route('site.categoria',$categoriaM->id)}}">{{$categoriaM->nome}}</a></li>
        @endforeach
    </ul>


    {{-- NAVBAR --}}
    <nav class="red">
        <div class="nav-wrapper container">

            <a href="#" class="brand-logo center">
                CursoLaravel
            </a>

            <ul id="nav-mobile" class="left">

                <li>
                    <a href="{{route('site.index')}}">Home</a>
                </li>

                <li>
                    <a href="#!" class="dropdown-trigger" data-target="dropdown1">
                        Categorias
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>

                <li>
                    <a href="">Carrinho</a>
                </li>

            </ul>

        </div>
    </nav>


    @yield('conteudo')


    {{-- MATERIALIZE JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {
                coverTrigger: false // Faz o menu abrir abaixo do botão
            });
        });
    </script>

</body>

</html>