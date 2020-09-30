@extends('layout')

@section('cabecalho')
    Editar Detalhes: {{ $nomeFilme }}
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
    <form method="post" action="/filmes/{{ $filme->id }}/detalhes/{{ $detalhes->id }}" class="form-horizontal">
        @csrf
        @method('PUT')
        <fieldset>
            <div class="card border-info mb-3">
                <div class="card-header card text-white bg-info mb-3">Editar detalhes </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class=" control-label">
                            <p class="text-muted text-right">
                                <h11>*</h11> Campo Obrigatório
                            </p>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group row">
                        <label class="col-md-2 form-group text-right" for="quem_indicou">Quem indicou: <h11>*</h11></label>
                        <div class="col-md-8">
                            <input id="quem_indicou" name="quem_indicou" placeholder="" class="form-control input-group-sm"
                                value="{{ $detalhes->quem_indicou }}" type="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group row">


                        <label class="col-md-2 form-group text-right">Dia que assistiu: <h11>*</h11></label>
                        <div class="col-sm-3">
                            <input id="data" name="data" placeholder="DD/MM/AAAA" class="form-control input-md"
                                value="{{ $detalhes->data }}" type="date" maxlength="11"
                                OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                        </div>


                    </div>



                    <div class="form-group row">
                        <label class="col-md-2 form-group text-right" for="avaliacao">Avaliação: <h11>*</h11></label>
                        <div class="col-md-3">
                            <select id="avaliacao" name="avaliacao" class="form-control">
                                <option value="">Selecione--</option>
                                <option value="Muito Ruim" <?php if ($detalhes->avaliacao == 'Muito Ruim') {
                                    echo 'selected';
                                    } ?>>Muito Ruim</option>
                                <option value="Ruim" <?php if ($detalhes->avaliacao == 'Ruim') {
                                    echo 'selected';
                                    } ?>>Ruim</option>
                                <option value="Bom" <?php if ($detalhes->avaliacao == 'Bom') {
                                    echo 'selected';
                                    } ?>>Bom</option>
                                <option value="Muito Bom" <?php if ($detalhes->avaliacao == 'Muito Bom') {
                                    echo 'selected';
                                    } ?>>Muito Bom</option>
                                <option value="Excelente" <?php if ($detalhes->avaliacao == 'Excelente') {
                                    echo 'selected';
                                    } ?>>Excelente</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label text-right" for="comentario">Comentário:</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="comentario" id="comentario"
                                rows="5">{{ $detalhes->comentario }}</textarea>
                        </div>
                    </div>



                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">
                        <button class="btn btn-success">Editar</button>
                        <button name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                    </div>
                </div>

            </div>
            </div>


        </fieldset>
    </form>
@endsection
