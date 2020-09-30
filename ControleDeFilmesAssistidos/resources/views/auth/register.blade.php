@extends('layoutLogin')


@section('conteudo')

    <div class="wrapper fadeInDown zero-raduis">
        @if ($errors->any())
            <div id="formContent" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <div id="formContent">
            <!-- Tabs Titles -->
            <div>
                <h2 class="my-5 text-danger">Controle de Filmes Assistidos</h2>
            </div>
            <!-- Icon -->
            <div class="fadeIn first">
                <h2 class="my-5">Registre-se</h2>
            </div>

            <!-- Login Form -->
            <form method="post">
                @csrf
                <input type="text" id="name"  class="fadeIn second zero-raduis" role="nome" name="name" placeholder="User">
                <input type="email" id="email"  class="fadeIn second zero-raduis" name="email" placeholder="E-mail">
                <input type="password" id="password"  class="fadeIn third zero-raduis" name="password" placeholder="password">

                <input type="submit" class="fadeIn fourth zero-raduis" value="Cadastrar">
                <a class="fadeIn fourth zero-raduis" href="/login"><h2>Voltar</h2></a>
                


            </form>


        </div>
    </div>

@endsection
