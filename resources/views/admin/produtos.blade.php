@extends('admin.layout')

@section('titulo', 'Produtos')

@section('conteudo')

    {{-- Botão para adicionar produto --}}
    <div class="fixed-action-btn">
        <a
            class="btn-floating btn-large bg-gradient-green modal-trigger"
            href="#modal1"
        >
            <i class="large material-icons">add</i>
        </a>
    </div>

    {{-- Modal de cadastro de produto --}}
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>
                <i class="material-icons">card_giftcard</i>
                Novo produto
            </h4>

            <form class="col s12">
                <div class="row">

                    <div class="input-field col s6">
                        <input
                            placeholder="Nome do produto"
                            id="first_name"
                            type="text"
                            class="validate"
                        >
                        <label for="first_name">Nome</label>
                    </div>

                    <div class="input-field col s6">
                        <input
                            id="last_name"
                            type="number"
                            class="validate"
                        >
                        <label for="last_name">Preço</label>
                    </div>

                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>
                                Escolha uma categoria
                            </option>
                            <option value="1">Eletrônicos</option>
                            <option value="2">Informática</option>
                            <option value="3">Acessórios</option>
                        </select>
                        <label>Categoria</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col s12">
                        <a
                            href="#!"
                            class="modal-close waves-effect waves-green btn blue right"
                        >
                            Cadastrar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Listagem de produtos --}}
    <div class="row container crud">

        {{-- Título --}}
        <div class="row titulo">
            <h1 class="left">Produtos</h1>

            <span class="right chip">
                {{ $produtos->count() }} produtos cadastrados
            </span>
        </div>

        {{-- Campo de pesquisa --}}
        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
                <form action="#" method="GET">
                    <div class="input-field">
                        <input
                            placeholder="Pesquisar..."
                            id="search"
                            type="search"
                            name="search"
                        >

                        <label class="label-icon" for="search">
                            <i class="material-icons">search</i>
                        </label>

                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>

        {{-- Tabela --}}
        <div class="card z-depth-4 registros">
            <table class="striped responsive-table">

                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($produtos as $produto)
                        <tr>
                            <td>
                                <img
                                    src="{{ asset('img/mouse.jpg') }}"
                                    alt="Imagem do produto"
                                    class="circle"
                                >
                            </td>

                            <td>#{{ $produto->id }}</td>

                            <td>{{ $produto->nome }}</td>

                            <td>
                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                            </td>

                            <td>
                                {{ $produto->categoria->nome ?? 'Sem categoria' }}
                            </td>

                            <td>
                                <a
                                    href="#!"
                                    class="btn-floating waves-effect waves-light orange"
                                    title="Editar produto"
                                >
                                    <i class="material-icons">mode_edit</i>
                                </a>

                                <a
                                    href="#!"
                                    class="btn-floating waves-effect waves-light red"
                                    title="Excluir produto"
                                >
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="center">
                                Nenhum produto cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Paginação --}}
        <div class="row">
        {{$produtos->links('custom.pagination')}}
        </div>

    </div>

@endsection