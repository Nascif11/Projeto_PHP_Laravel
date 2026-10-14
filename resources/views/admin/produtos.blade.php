@extends('admin.layout')

@section('titulo', 'Produtos')

@section('conteudo')

    {{-- Botão para adicionar produto --}}
    <div class="fixed-action-btn">
        <a
            class="btn-floating btn-large bg-gradient-green modal-trigger"
            href="#create"
        >
            <i class="large material-icons">add</i>
        </a>
    </div>

    {{-- Modal de cadastro de produto --}}
    @include('admin.produtos.create')

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
                                    href="#delete-{{$produto->id}}"
                                    class="btn-floating modal-trigger waves-effect waves-light red"
                                    title="Excluir produto"
                                >
                                @include('admin.produtos.delete')   
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