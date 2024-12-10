<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AvaliacaoController extends Controller
{
    public function validUser(Request $request)
    {
        // Coletando o id e token
        [$id, $token] = explode("|", $request->bearerToken(), 2);

        // Recuperando o token pelo id
        $user_id = DB::table('personal_access_tokens')->find($id)->tokenable_id;

        // Recuperando usuário a partir do id do token
        $usuario = DB::table('usuarios')->find($user_id);

        return $usuario;
    }

    public function index()
    {
        return response()->json(Avaliacao::all(), 200);
    }

    public function store(Request $request)
    {
        $usuario = $this->validUser($request);

        if(!$usuario)
        {
            return response()->json(['message'=>'Usuário não autenticado.'], 401);
        }

        try {
            $validatedData = $request->validate([
                'usuario_id' => 'required|exists:usuarios,id|min:1',
                'receita_id' => 'required|exists:receitas,id|min:1',
                'estrelas' => 'required|int|min:1|max:5',
            ],[
                'usuario_id.required' => 'É preciso preencher o campo usuario_id',
                'receita_id.required' => 'É preciso preencher o campo receita_id',
                'estrelas.required' => 'É preciso preencher o campo estrelas',
                'usuario_id.exists' => 'O usuário especificado não existe',
                'receita_id.exists' => 'A receita especificada não existe',
                'estrelas.min' => "É preciso ter no mínimo 1 estrela e no máximo 5",
                'estrelas.max' => "É preciso ter no mínimo 1 estrela e no máximo 5"
            ]);

            // Impedir que usuários façam comentários para outros usuários
            if($request->usuario_id != $usuario->id)
            {
                return response()->json(['message'=>'Não é possível acessar esse recurso.'], 403);
            }

            $avaliacao = Avaliacao::create([
                'usuario_id' => $request->usuario_id,
                'receita_id' => $request->receita_id,
                'estrelas' => $request->estrelas,
            ]);

            return response()->json("", 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro de validação', 'errors' => $e->errors()], 422);
        }
    }

    public function show($usuario, $receita)
    {
        $avaliacao = Avaliacao::where('usuario_id', $usuario)->where('receita_id', $receita)->first();

        if(!$avaliacao)
        {
            return response()->json(["message" => 'Avaliação não encontrada'], 404);
        }

        return response()->json($avaliacao, 200);
    }

    public function update(Request $request, $usuario_id, $receita_id)
    {
        $usuario = $this->validUser($request);

        if(!$usuario)
        {
            return response()->json(['message'=>'Usuário não autenticado.'], 401);
        }

        $avaliacao = Avaliacao::where('usuario_id', $usuario_id)->where('receita_id', $receita_id)->first();

        if (!$avaliacao)
        {
            return response()->json(["message" => 'Avaliação não encontrada'], 404);
        }

        if($avaliacao->usuario_id != $usuario->id)
        {
            return response()->json(['message' => 'Não é possível acessar esse recurso.'], 403);
        }

        try {
            $validatedData = $request->validate([
                'estrelas' => 'required|int|min:1|max:5',
            ],[
                'estrelas.required' => 'É preciso preencher o campo estrelas',
                'estrelas.min' => "É preciso ter no mínimo 1 estrela e no máximo 5",
                'estrelas.max' => "É preciso ter no mínimo 1 estrela e no máximo 5"
            ]);

            $avaliacao->update([
                'estrelas' => $request->estrelas,
            ]);

            return response()->json($avaliacao, 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro de validação', 'errors' => $e->errors()], 422);
        }
    }    

    public function destroy(Request $request, $usuario_id, $receita_id)
    {
        $usuario = $this->validUser($request);

        if(!$usuario)
        {
            return response()->json(['message'=>'Usuário não autenticado.'], 401);
        }

        $avaliacao = Avaliacao::where('usuario_id', $usuario_id)->where('receita_id', $receita_id)->first();

        if (!$avaliacao)
        {
            return response()->json(["message" => 'Avaliação não encontrada'], 404);
        }

        if($avaliacao->usuario_id != $usuario->id)
        {
            return response()->json(['message' => 'Não é possível acessar esse recurso.'], 403);
        }

        $avaliacao->delete();

        return response()->json('', 201);
    }

    public function medium($receita)
    {
        $avaliacao = Avaliacao::where('receita_id', $receita)->get();

        if(count($avaliacao) == 0)
        {
            return response()->json(["message" => 'Avaliação não encontrada', "found" => false], 404);
        }

        $media = 0;
        for($i = 0 ;$i < count($avaliacao); $i++)
        {
            $media += $avaliacao[$i]->estrelas/count($avaliacao);
        } 

        return response()->json(['media' => number_format($media,2),'quantidade'=> count($avaliacao), "found" => true], 200);
    }
}
