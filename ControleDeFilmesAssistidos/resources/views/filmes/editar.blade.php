@extends('layout')

@section('cabecalho')
    Filmes/Editar Filme
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form method="post" action="/filmes/{{ $filme->id }}" class="form-group">
        @csrf
        @method('PUT')
        <div class="card border-info mb-3">
            <div class="card-header card text-white bg-info mb-3">Editar Filme</div>
            <div class="card-body">
                <div class="form-group">
                    <div class="col-md-12 control-label">
                        <p class="text-muted text-right ">
                            <h11>*</h11> Campo Obrigatório
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-group text-right" for="nomeFilme">Nome do Filme: <h11>*</h11></label>
                    <div class="col-md-8">
                        <input id="nome" name="nome" placeholder="" class="form-control input-group-sm" 
                            type="" value="{{ $filme->nome }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-group text-right" for="genero">Genêro: <h11>*</h11></label>
                    <div class="col-md-2">
                        <select  name="genero" id="genero" class="form-control">
                            <option value="Ação" <?php if ($filme->genero == 'Ação') {
                                echo 'selected';
                                } ?>>Ação</option>
                            <option value="Terror" <?php if ($filme->genero == 'Terror') {
                                echo 'selected';
                                } ?>>Terror</option>
                            <option value="Comedia" <?php if ($filme->genero == 'Comedia') {
                                echo 'selected';
                                } ?>>Comédia</option>
                            <option value="Aventura" <?php if ($filme->genero == 'Aventura') {
                                echo 'selected';
                                } ?>>Aventura</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-group text-right" for="classificacaoIndicativa">Classificação Indicativa:
                        <h11>*</h11>
                    </label>
                    <div class="col-md-2">
                        <select  name="classificacaoIndicativa" id="classificacaoIndicativa" class="form-control">
                            <option value="0" <?php if ($filme->classificacaoIndicativa == 0) {
                                echo 'selected';
                                } ?>>Livre</option>
                            <option value="10" <?php if ($filme->classificacaoIndicativa == 10) {
                                echo 'selected';
                                } ?>>10</option>
                            <option value="12" <?php if ($filme->classificacaoIndicativa == 12) {
                                echo 'selected';
                                } ?>>12</option>
                            <option value="14" <?php if ($filme->classificacaoIndicativa == 14) {
                                echo 'selected';
                                } ?>>14</option>
                            <option value="16" <?php if ($filme->classificacaoIndicativa == 16) {
                                echo 'selected';
                                } ?>>16</option>
                            <option value="18" <?php if ($filme->classificacaoIndicativa == 18) {
                                echo 'selected';
                                } ?>>18</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <button class="btn btn-success">Editar</button>
                    <button name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                </div>
            </div>
        </div>
        
    </form>

@endsection
