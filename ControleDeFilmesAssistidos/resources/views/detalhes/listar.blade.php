@extends('layout')

@section('cabecalho')
    {{ $nomeFilme }}
@endsection
@section('conteudo')

    @if (!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif
    <a href="/filmes/{{ $film }}/detalhes/adicionar">
        <button class="btn btn-dark mb-2"<?php if(count($detalhes)!=0){
            echo("disabled");
        }
       
            ?>>Adicionar Detalhes+</button>
    </a>

    <table class="table table-bordered table-responsive-lg">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Quem indicou</th>
                <th>Data</th>
                <th>Avaliação</th>
                <th>Comentário</th>
                <th>Excluir</th>
                <th>Editar</th>

            </tr>
        </thead>
        <?php foreach ($detalhes as $detalhe) { ?>
        <tr class="text-center">
            <td>{{ $detalhe->quem_indicou }}</td>
            <td>@php
                echo date('d/m/Y',strtotime($detalhe->data))
            @endphp</td>
            <td>{{$detalhe->avaliacao}}</td>
            <td>{{$detalhe->comentario}}</td>
            <td>
                <form method="post" action="/filmes/{{ $film }}/detalhes/{{ $detalhe->id }}"
                    onsubmit="return confirm('Tem certeza que deseja excluir as informações?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mr-2 mt-3">Excluir</button>
                </form>
            </td>
            <td>
            <a href="/filmes/{{ $film }}/detalhes/{{ $detalhe->id }}/edit"
                class="btn btn-warning btn-sm mr-2 mt-3">Editar</a>
            </td>
        </tr>
        <?php } ?>


    </table>
    <div>
        <a href="{{ route('listar_filmes') }}"><button class="btn btn-primary btn-md mr-2 mt-3">Voltar</button></a>
    </div>
@endsection
