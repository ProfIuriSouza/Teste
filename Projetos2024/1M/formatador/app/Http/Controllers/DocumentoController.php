<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoController extends Controller
{
    public function index() {
        $documentos = Documento::where('usu_id', auth()->id())->get();
        return $documentos;
    }

    public function store(Request $request) {
        $texto = $request->input('texto');
        $texto_puro = strip_tags($texto);
        $usuario = $request->input('usu_id');

        $d = Documento::create([
            'texto' => $texto,
            'texto_puro' => $texto_puro,
            'usu_id' => $usuario,
        ]);
        $d->save();

        return response(
            ['location' => ('documentos/'. $d->id)], 201
        );
    }

    public function show(int $docId) {
        $documento = Documento::find($docId);

        if(!$documento)
            return response(status: 404);
        return $documento;
    }

    public function update(Request $request, int $docId) {
        $documento = Documento::find($docId);
        $texto = $request->input('texto');

        if ($texto)
            $documento->texto = $texto;

        $documento->save();
    }

    public function destroy (int $docId) {
        $documento = Documento::find($docId);
        
        if (!$documento)
            return response(status: 404);
        $documento->delete();
    }
}