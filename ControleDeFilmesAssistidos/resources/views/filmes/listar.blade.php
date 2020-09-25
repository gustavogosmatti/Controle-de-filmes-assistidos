@extends('layout')

@section('cabecalho')
    Filmes Assistidos
@endsection
@section('conteudo')
    <a href="/filmes/adicionar" class="btn btn-dark mb-2">Novo Filme +</a>
    <ul class="list-group">
        @foreach ($data as $filme)
    <li class="list-group-item">{{ $filme['nomeFilme'] }} - {{ $filme['genero'] }} - {{$filme['classificacaoIndicativa']}}</li>
        @endforeach
    </ul>
@endsection
