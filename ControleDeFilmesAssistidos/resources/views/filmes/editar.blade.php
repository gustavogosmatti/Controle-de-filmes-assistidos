@extends('layout')

@section('cabecalho')
    Filmes/Editar Filme
@endsection

@section('conteudo')
<form method="post" action="/filmes/{{$filme->id}}">
    @csrf
    @method('PUT')
    <div class="input-group d-flex justify-content-between">
        <label class="mr-2" for="nomeFilme">Nome do Filme:</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$filme->nome}}">
        <label  for="genero">Genêro</label>
        <select name="genero" id="genero">
            <option value="Ação" <?php if($filme->genero == "Ação"){echo('selected');} ?>>Ação</option>
            <option value="Terror" <?php if($filme->genero == "Terror"){echo('selected');} ?>>Terror</option>
            <option value="Comedia" <?php if($filme->genero == "Comedia"){echo('selected');} ?>>Comédia</option>
            <option value="Aventura" <?php if($filme->genero == "Aventura"){echo('selected');} ?>>Aventura</option>
        </select>
        <label class="ml-2 mr-2" for="classificacaoIndicativa">Classificação Indicativa</label>
        <select name="classificacaoIndicativa" id="classificacaoIndicativa">
            <option value="0" <?php if($filme->classificacaoIndicativa == 0){echo('selected');} ?>>Livre</option>
            <option value="10" <?php if($filme->classificacaoIndicativa == 10){echo('selected');} ?>>10</option>
            <option value="12" <?php if($filme->classificacaoIndicativa == 12){echo('selected');} ?>>12</option>
            <option value="14" <?php if($filme->classificacaoIndicativa == 14){echo('selected');} ?>>14</option>
            <option value="16" <?php if($filme->classificacaoIndicativa == 16){echo('selected');} ?>>16</option>
            <option value="18" <?php if($filme->classificacaoIndicativa == 18){echo('selected');} ?>>18</option>
        </select>

    </div>
    <button class="btn btn-primary mt-2">Editar</button>
</form>
    
@endsection

