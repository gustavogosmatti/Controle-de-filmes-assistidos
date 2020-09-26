<?php

namespace App\Http\Controllers;

use App\Detalhes;
use App\Filme;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;

class DetalhesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $film)
    {
        $detalhes = Detalhes::query()->where('filme_id', $film)->get();
        $filme = Filme::find($film);
        return view('detalhes.listar', [
            'detalhes' => $detalhes,
            'film' => $film,
            'nomeFilme' => $filme->nome
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($filme)
    {
        return view('detalhes.adicionar', [
            'filme' => $filme
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    use DatabaseMigrations;
    public function store(Request $request, $film)
    {

        $detalhes = new Detalhes($request->all());
        $filme = Filme::find($film);
        $filme->detalhes()->save($detalhes);
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
        return view('detalhes.editar', [
            'detalhes' => $detalhes,
            'filme' => $filme
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalhes  $detalhes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $filme, $id)
    {
        $detalhes = Detalhes::find($id);
        $detalhes->data = $request->data;
        $detalhes->quem_indicou = $request->quem_indicou;
        $detalhes->avaliacao = $request->avaliacao;
        $detalhes->comentario = $request->comentario;
        $detalhes->save();
        return redirect()->route('listar_detalhes',[
            'filme'=>$filme
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalhes  $detalhes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $filme)
    {
        $detalhes = Detalhes::find($id);
        $detalhes->delete();
        return redirect()->route('listar_detalhes', [
            'filme' => $filme
        ]);
    }
}
