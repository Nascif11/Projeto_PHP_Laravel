@extends('site.layout')
@section('title', 'Home')
@section('conteudo')
    {{-- IGNORE ---}}

    {{--isset($nome) ? $nome 'existe' : 'Não existe nome'--}}
    {{$teste ?? 'padrão'}}

@endsection