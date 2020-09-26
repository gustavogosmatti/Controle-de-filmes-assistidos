@extends('layout')

@section('cabecalho')
    detalhes Assistidos
@endsection
@section('conteudo')
    <a href="/detalhes/{{ $film }}/detalhes/create" class="btn btn-dark mb-2">adicionar mais detalhes</a>
    <ul class="list-group">
        @foreach ($detalhes as $detalhe)
            <li class="list-group-item d-flex justify-content-between">
                <div>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-info">{{ $detalhe->data }}</li>
                        <li class="list-group-intem list-group-item-primary">{{ $detalhe->quem_indicou }}</li>
                        <li class="list-group-intem list-group-item-secondary">{{ $detalhe->avaliacao }}</li>
                        <li class="list-group-intem list-group-item-warning">{{ $detalhe->comentario }}</li>
                    </ul>
                </div>
                <span class="d-flex align-items-center">
                    <form method="post" action="/detalhes/{{ $film }}/detalhes/{{ $detalhe->id }}"
                        onsubmit="return confirm('Tem certeza que deseja excluir as informações?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm btn-sm mt-2">Excluir</button>
                    </form>
                    <a href="/filmes/{{ $film }}/detalhes/{{ $detalhe->id }}/edit"
                        class="btn btn-warning btn-sm mr-2">Editar</a>

                </span>
            </li>
        @endforeach
    </ul>
@endsection
