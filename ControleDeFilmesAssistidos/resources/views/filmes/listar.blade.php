@extends('layout')

@section('cabecalho')
    Filmes Assistidos
@endsection
@section('conteudo')
    @if (!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>

    @endif

    <a href="/filmes/adicionar" class="btn btn-dark mb-2">Novo Filme +</a>

    <div class="container"></div>
    <table id="minhaTabela" class="table table-bordered table-responsive-lg">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Filme</th>
                <th>Gênero</th>
                <th>Classificação</th>
                <th>Excluir</th>
                <th>Editar</th>
                <th>Detalhes</th>



            </tr>
        </thead>
        <?php foreach ($filmes as $filme) { ?>
        <tr class="text-center">
            <td>{{ $filme->nome }}</td>
            <td>{{ $filme->genero }}</td>
            <td class=" <?php if ($filme->classificacaoIndicativa == 0) {
                    echo 'table-success';
                } elseif ($filme->classificacaoIndicativa == 10) {
                    echo 'table-secondary';
                } elseif ($filme->classificacaoIndicativa == 12) {
                    echo 'table-warning';
                } elseif ($filme->classificacaoIndicativa == 14) {
                    echo 'table-danger';
                } elseif ($filme->classificacaoIndicativa == 16) {
                    echo 'table-danger';
                } elseif ($filme->classificacaoIndicativa == 18) {
                    echo 'table-dark';
                } ?>"><?php if ($filme->classificacaoIndicativa == 0) {
                echo 'Livre';
                } else {
                echo $filme->classificacaoIndicativa . ' anos';
                } ?></td>
            <td>
                <form method="post" action="/filmes/{{ $filme->id }}"
                    onsubmit="return confirm('Tem certeza que deseja excluir {{ $filme->nome }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mr-2 mt-3">Excluir</button>
                </form>
            </td>
            <td>
                <a href="/filmes/{{ $filme->id }}/edit" class="btn btn-warning btn-sm mr-2 mt-3">Editar</a>
            </td>
            <td>
                <a href="/filmes/{{ $filme->id }}/detalhes" class="btn btn-primary btn-sm mt-3">Detalhes</a>
            </td>
        </tr>
        <?php } ?>


    </table>
    </div>


@endsection
