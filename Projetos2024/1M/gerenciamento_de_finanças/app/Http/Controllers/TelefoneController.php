<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefones = Telefone::all();
        return $telefones;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numero = $request->input('numero');
        $user_id = request()->input('user_id');
        $p = Telefone::create(['numero' => $numero, 'user_id' => $user_id]);
        $id = $p->id;
        return true; #analisar, é ideal que retorne um "refresh" da página
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        $telefone = Telefone::find($id);
        return $telefone;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $telefone = Telefone::find($id);
        $numero = request()->input('numero');
        if ($numero)
            $telefone->numero = $numero;
        $telefone->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $telefone = Telefone::find($id);
        $telefone->delete();
    }
}
