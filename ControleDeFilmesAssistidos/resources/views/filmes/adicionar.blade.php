@extends('layout')

@section('cabecalho')
    Filmes/Adicionar Filme
@endsection

@section('conteudo')
<form method="post">
    @csrf
    <div class="input-group d-flex justify-content-between">
        <label class="mr-2" for="nomeFilme">Nome do Filme:</label>
        <input type="text" class="form-control" id="nomeFilme" name="nomeFilme">
        <label  for="genero">Genêro</label>
        <select name="genero" id="genero">
            <option value="Ação">Ação</option>
            <option value="Terror">Terror</option>
            <option value="Comedia">Comédia</option>
            <option value="Aventura">Aventura</option>
        </select>
        <label class="ml-2 mr-2" for="classificacaoIndicativa">Classificação Indicativa</label>
        <select name="classificacaoIndicativa" id="classificacaoIndicativa">
            <option value="Livre">Livre</option>
            <option value="10">10</option>
            <option value="12">12</option>
            <option value="14">14</option>
            <option value="16">16</option>
            <option value="18">18</option>
        </select>

    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
    
@endsection

