<?php

Namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $user_id)
    {
        $obras = Obra::all()->where('user_id', $user_id);
        return $obras;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(string $user_id, Request $request)
    {
        $cliente = $request->input('cliente');
        $localizacao = request()->input('localizacao');
        $descricao = request()->input('descricao');
        $p = Obra::create(['cliente' => $cliente, 'localizacao' => $localizacao, 'descricao' => $descricao, 'user_id' => $user_id]);
        $id = $p->id;
        return true; #analisar, é ideal que retorne um "refresh" da página
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show(string $user_id, string $id, Request $request)
    {
        $obra = Obra::find($id);
        return $obra;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function update(int $user_id, int $id,Request $request)
    {
        $obra = Obra::find($id);
        $cliente = request()->input('cliente');
        if ($cliente){
            $obra->cliente = $cliente;
        }
        $localizacao = request()->input('localizacao');
        if ($localizacao){
            $obra->localizacao = $localizacao;
        }
        $descricao = request()->input('descricao');
        if ($descricao){
            $obra->descricao = $descricao;
        }
        $obra->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $user_id, int $id,Request $request)
    {
        $obra = Obra::find($id);
        $obra->delete();
    }
}
