<?php

namespace App\Http\Controllers;

use App\Filme;
use App\Http\Requests\FilmesFormRequest;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $filmes = Filme::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('filmes.listar', [
            'filmes' => $filmes,
            'mensagem' => $mensagem
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filmes.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(FilmesFormRequest $request)
    {
    
        Filme::create($request->all());
        $request->session()->flash('mensagem',"Filme $request->nome criada com sucesso");
        return redirect()->route('listar_filmes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filme = Filme::find($id);
        return view('filmes.editar', [
            'filme' => $filme
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmesFormRequest $request, $id)
    {
        $filme = Filme::find($id);
        $filme->nome = $request->nome;
        $filme->genero = $request->genero;
        $filme->classificacaoIndicativa = $request->classificacaoIndicativa;
        $filme->save();
        $request->session()->flash('mensagem',"Filme $filme->nome alterado com sucesso!");
        return redirect()->route('listar_filmes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $filme = Filme::find($id);
        $filme->delete();
        $request->session()->flash('mensagem',"Filme $filme->nome removido com sucesso!");
        return redirect()->route('listar_filmes');
    }
}
