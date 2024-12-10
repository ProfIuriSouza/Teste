<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    public function verifyToken(Request $request, $usuario)
    {
        // Coletando o id e token
        [$id, $token] = explode("|", $request->bearerToken(), 2);

        // Recuperando o token pelo id
        $tokenRecord = DB::table('personal_access_tokens')->find($id)->token;

        // Recuperando o token do usuário
        $user_token = $usuario->tokens()->pluck('token')->first();

        return $user_token == $tokenRecord;
    }

    public function index()
    {
        return response()->json(Usuario::all(), 200);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|string',
                'email' => 'required|email|unique:usuarios,email',
                'senha' => 'required|min:8',
            ], [
                'nome.string' => 'O nome deve ser válido.',
                // 'nome.required' => 'O campo nome é obrigatório',
                // 'email.required' => 'O campo email é obrigatório',
                'email.unique' => 'Esse email já está em uso',
                // 'email.email' => 'O email deve ser válido',
                // 'senha.required' => 'A campo senha é obrigatório',
                'senha.min' => 'A senha deve ter pelo menos 8 caracteres',
            ]);

            $usuario = Usuario::create([
                'nome' => $validatedData['nome']->nome,
                'email' => $validatedData['email']->email,
                'senha' => Hash::make($validatedData['senha']->senha)
            ]);
            
            return response()->json('', 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro de validação', 'errors' => $e->errors()], 422);
        }
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);

        if(!$usuario)
        {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        return response()->json($usuario, 200);
    }

    public function update(Request $request, $id)
    {
        
        $usuario = Usuario::find($id);
        
        
        if(!$usuario)
        {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        if(!$this->verifyToken($request, $usuario))
        {
            return response()->json(['message' => 'Usuário não autorizado.'], 403);
        }

        try {
            $validatedData = $request->validate([
                'nome' => 'required|string',
                'email' => 'required|email|unique:usuarios,email,'. $id,
                'senha' => 'required|min:8',
            ], [
                'nome.string' => 'O nome deve ser válido.',
                'nome.required' => 'O campo nome é obrigatório',
                'email.required' => 'O campo email é obrigatório',
                'email.unique' => 'Esse email já está em uso',
                'email.email' => 'O email deve ser válido',
                'senha.required' => 'A campo senha é obrigatório',
                'senha.min' => 'A senha deve ter pelo menos 8 caracteres',
            ]);

            $usuario->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'senha' => Hash::make($request->senha)
            ]);

            return response()->json('', 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro de validação', 'errors' => $e->errors()], 422);
        }
    }

    public function destroy(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario)
        {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        if(!$this->verifyToken($request, $usuario))
        {
            return response()->json(['message' => 'Usuário não autorizado.'], 403);
        }

        $usuario->delete();
        return response()->json('', 204);
    }
}
