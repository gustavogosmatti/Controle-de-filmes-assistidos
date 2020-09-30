<?php

namespace App\Http\Controllers;

use App\Detalhes;
use App\Filme;
use App\Http\Requests\DetalhesFormRequest;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;

class DetalhesController extends Controller
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
    
    
    public function index(Request $request,$film)
    {
        $detalhes = Detalhes::query()->where('filme_id', $film)->get();
        $filme = Filme::find($film);
        $mensagem = $request->session()->get('mensagem');
        return view('detalhes.listar', [
            'detalhes' => $detalhes,
            'film' => $film,
            'nomeFilme' => $filme->nome,
            'mensagem' =>$mensagem
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($filme)
    {
        $film = Filme::find($filme);
        return view('detalhes.adicionar', [
            'filme' => $filme,
            'nomeFilme' => $film->nome
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(DetalhesFormRequest $request, $film)
    {

        $detalhes = new Detalhes($request->all());
        $filme = Filme::find($film);
        $filme->detalhes()->save($detalhes);
        $request->session()->flash('mensagem',"Informações adicionadas com sucesso!");
        return redirect('/filmes/' . $film . '/detalhes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detalhes  $detalhes
     * @return \Illuminate\Http\Response
     */
    public function show(Detalhes $detalhes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalhes  $detalhes
     * @return \Illuminate\Http\Response
     */
    public function edit($filme, $id)
    {
        $detalhes = Detalhes::find($id);
        $filme = Filme::find($filme);
        return view('detalhes.editar', [
            'detalhes' => $detalhes,
            'filme' => $filme,
            'nomeFilme' => $filme->nome
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalhes  $detalhes
     * @return \Illuminate\Http\Response
     */
    public function update(DetalhesFormRequest $request, $filme, $id)
    {
        $detalhes = Detalhes::find($id);
        $detalhes->data = $request->data;
        $detalhes->quem_indicou = $request->quem_indicou;
        $detalhes->avaliacao = $request->avaliacao;
        $detalhes->comentario = $request->comentario;
        $detalhes->save();
        $request->session()->flash('mensagem',"Informações alteradas com sucesso!");
        return redirect()->route('listar_detalhes', [
            'film' => $filme,
            'film2' => $filme
        ]);

        //return redirect('/filmes/'.$filme.'/detalhes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalhes  $detalhes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$filme, $id)
    {
        $detalhes = Detalhes::find($id);
        $detalhes->delete();
        /*return redirect()->route('listar_detalhes', [
            'filme' => $filme
        ]);*/
        $request->session()->flash('mensagem',"Informações deletadas com sucesso!");
        return redirect('/filmes/' . $filme . '/detalhes');
    }
}
