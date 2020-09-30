@extends('layout')

@section('cabecalho')

    Filmes/Adicionar Filme
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
    <form method="post" class="form-horizontal">
        @csrf
        <fieldset>
            <div class="card border-info mb-3">
                <div class="card-header card text-white bg-info mb-3">Cadastro de Filme </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="control-label">
                            <p class="text-muted text-right">
                                <h11>*</h11> Campo Obrigatório
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-group text-right" for="nome">Nome do Filme: <h11>*</h11></label>
                        <div class="col-md-8">
                            <input type="" class="form-control" id="nome" name="nome">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-group text-right" for="genero">Genêro: <h11>*</h11></label>
                        <div class="col-md-2">
                            <select name="genero" id="genero" class="form-control">

                                <option value="Ação">Ação</option>
                                <option value="Terror">Terror</option>
                                <option value="Comedia">Comédia</option>
                                <option value="Aventura">Aventura</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-group text-right" for="classificacaoIndicativa">Classificação
                            Indicativa: <h11>*</h11>
                        </label>
                        <div class="col-md-2">
                            <select name="classificacaoIndicativa" id="classificacaoIndicativa" class="form-control">

                                <option value="0">Livre</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="14">14</option>
                                <option value="16">16</option>
                                <option value="18">18</option>

                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">
                        <button class="btn btn-success">Cadastrar</button>
                        <button name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>

                    </div>
                </div>
            </div>

        </fieldset>
    </form>

@endsection
