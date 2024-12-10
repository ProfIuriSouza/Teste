<?php

Namespace App\Http\Controllers;

use App\Models\Relacionado;
use Illuminate\Http\Request;

class RelacionadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $id_obra)
    {
        $relacionados = Relacionado::all()->where('obra_id', $id_obra);
        return $relacionados;
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
        $p = Relacionado::create(['nome' => $nome, 'custo' => $custo, 'descricao' => $descricao, 'obra_id' => $obra_id]);
        $id = $p->id;
        return true; #analisar, é ideal que retorne um "refresh" da página
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Relacionado  $relacionado
     * @return \Illuminate\Http\Response
     */
    public function show(string $id_obra, int $id_relacionado, Request $request)
    {
        $relacionado = Relacionado::find($id_relacionado)->where('obra_id', $id_obra);
        return $relacionado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Relacionado  $relacionado
     * @return \Illuminate\Http\Response
     */
    public function update(string $id_obra, int $id_relacionado, Request $request)
    {
        $relacionado = Relacionado::find($id_relacionado)->where('obra_id', $id_obra);
        $nome = request()->input('nome');
        if ($nome)
            $relacionado->nome = $nome;
        $custo = request()->input('custo');
        if ($custo)
            $relacionado->custo = $custo;
        $descricao = request()->input('descricao');
        if ($descricao)
            $relacionado->descricao = $descricao;
        $relacionado->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Relacionado  $relacionado
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id_obra, int $id_relacionado, Request $request)
    {
        $relacionado = Relacionado::find($id_relacionado)->where('obra_id', $id_obra);
        $relacionado->delete();
    }
}
