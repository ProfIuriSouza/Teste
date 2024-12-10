<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ComentarioController extends Controller
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
        return response()->json(Comentario::all(), 200);
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
                'texto' => 'required|string|min:1',
            ],[
                'usuario_id.required' => 'É preciso preencher o campo usuario_id',
                'receita_id.required' => 'É preciso preencher o campo receita_id',
                'texto.required' => 'É preciso preencher o campo texto',
                'usuario_id.exists' => 'O usuário especificado não existe',
                'receita_id.exists' => 'A receita especificada não existe',
            ]);

            // Impedir que usuários façam comentários para outros usuários
            if($request->usuario_id != $usuario->id)
            {
                return response()->json(['message'=>'Usuário não autorizado.'], 403);
            }

            $comentario = Comentario::create([
                'usuario_id' => $request->usuario_id,
                'receita_id' => $request->receita_id,
                'texto' => $request->texto,
            ]);

            return response()->json('', 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro de validação', 'errors' => $e->errors()], 422);
        }
    }

    public function show($usuario, $receita)
    {
        $comentario = Comentario::where('usuario_id', $usuario)->where('receita_id', $receita)->first();

        if(!$comentario)
        {
            return response()->json(['message'=>'Comentario não encontrado'], 404);
        }

        return response()->json($comentario, 200);
    }

    public function update(Request $request, $usuario_id, $receita_id)
    {
        $usuario = $this->validUser($request);
        
        if(!$usuario)
        {
            return response()->json(['message'=>'Usuário não autenticado.'], 401);
        }
        
        $comentario = Comentario::where('usuario_id', $usuario_id)->where('receita_id', $receita_id)->first();
        
        if (!$comentario)
        {
            return response()->json(['message'=>'Comentario não encontrado'], 404);
        }
        
        // Se o usuário que está tentando editar o comentário for diferente do dono
        if($usuario->id != $comentario->usuario_id)
        {
            return response()->json(['message'=>'Recurso não autorizado.'],403);
        }

        try {
            $validatedData = $request->validate([
                'texto' => 'required|string|min:1',
            ],[
                'texto.required' => 'É preciso preencher o campo texto',
            ]);

            $comentario->update([
                'texto' => $request->texto,
            ]);

            return response()->json('', 201);
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
        
        $comentario = Comentario::where('usuario_id', $usuario_id)->where('receita_id', $receita_id)->first();

        if(!$comentario)
        {
            return response()->json(['message'=>'Comentario não encontrado'], 404);
        }

        // Se o usuário que está tentando editar o comentário for diferente do dono
        if($usuario->id != $comentario->usuario_id)
        {
            return response()->json(['message'=>'Recurso não autorizado.'],403);
        }
        
        $comentario->delete();

        return response()->json("", 201);
    }

    public function receita(Request $id, $receita_id)
    {
        $comentarios = Comentario::where('receita_id', $receita_id)->get();
        
        if(count($comentarios) == 0)
        {
            return response()->json("", 404);
        }


        for($i = 0; $i < count($comentarios); $i++)
        {
            $usuario = Usuario::where('id', $comentarios[$i]->usuario_id)->first();
            if($usuario)
            {
                $comentarios[$i]->usuario_nome = $usuario->nome;
            } else {
                $comentarios[$i]->usuario_nome = "excluído";
            }
        }

        return response()->json($comentarios,200);
    }
}
