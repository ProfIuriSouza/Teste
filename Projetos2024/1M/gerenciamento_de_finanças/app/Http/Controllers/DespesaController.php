<?php

Namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $id_obra)
    {
        $despesas = Despesa::all()->where('obra_id', $id_obra);
        return $despesas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(string $id_obra, Request $request)
    {
        $nome = $request->input('nome');
        $custo = request()->input('custo');
        $descricao = request()->input('descricao');
        $obra_id = $id_obra;
        $p = Despesa::create(['nome' => $nome, 'custo' => $custo, 'descricao' => $descricao, 'obra_id' => $obra_id]);
        $id = $p->id;
        return true; #analisar, é ideal que retorne um "refresh" da página
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function show(string $id_obra, int $id_despesa, Request $request)
    {
        $despesa = Despesa::find($id_despesa)->where('obra_id', $id_obra);
        return $despesa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update(string $id_obra, int $id_despesa, Request $request)
    {
        $despesa = Despesa::find($id_despesa)->where('obra_id', $id_obra);
        $nome = request()->input('nome');
        if ($nome)
            $despesa->nome = $nome;
        $custo = request()->input('custo');
        if ($custo)
            $despesa->custo = $custo;
        $descricao = request()->input('descricao');
        if ($descricao)
            $despesa->descricao = $descricao;
        $despesa->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id_obra, int $id_despesa, Request $request)
    {
        $despesa = Despesa::find($id_despesa)->where('obra_id', $id_obra);
        $despesa->delete();
    }
}
