@extends('site.layout')
@section('title', 'Home')
@section('conteudo')
    {{-- IGNORE ---}}

    {{--isset($nome) ? $nome 'existe' : 'Não existe nome'--}}
 
 {{--$teste ?? 'padrão'--}}
<div class="row">

    <h5>Categorias:{{$categoria->nome}}</h5>
    @foreach($produtos as $produto)

        <div class="col s12 m4">
            <div class="card">

                <div class="card-image">
                    
                    <img src="{{ $produto->imagem }}" class="responsive-img">
                    <a href="{{route('site.details', $produto->slug)}} " class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>

                <div class="card-content">
                    <span class="card-title">
                        {{ $produto->nome }}
                    </span>

                    <p>
                        {{ Str::limit($produto->descricao, 20) }}
                    </p>
                </div>

                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>

            </div>
        </div>

    @endforeach
</div>
<div class="row center">
    
</div>


@endsection