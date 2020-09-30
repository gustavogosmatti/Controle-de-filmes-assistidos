@extends('layoutLogin')


@section('conteudo')
    <div class="wrapper fadeInDown zero-raduis">
        @if ($errors->any())
            <div id="formContent" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li type="">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="wrapper fadeInDown zero-raduis">
            <div id="formContent">
                <!-- Tabs Titles -->
                <div>
                    <h2 class="my-5 text-danger">Controle de Filmes Assistidos</h2>
                </div>
                <!-- Icon -->
                <div class="fadeIn first">
                    <h2 class="my-5">Faça seu login</h2>
                    
                </div>

                <!-- Login Form -->
                <form method="post">
                    @csrf
                    <input type="email" id="email" class="fadeIn second zero-raduis" name="email" placeholder="E-mail">
                    <input type="password" id="password" class="fadeIn third zero-raduis" name="password"
                        placeholder="Password">


                    <input type="submit" class="fadeIn fourth zero-raduis" value="Entrar">
                    <a href="/register" class="fadeIn fourth zero-raduis">
                        <h2>Registre-se agora</h2>
                    </a>
                </form>


            </div>
        </div>
    </div>

@endsection
