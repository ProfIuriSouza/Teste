<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ReceitaController extends Controller
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

    public function search(Request $request)
    {
        // Coletando a pesquisa
        $pesquisa = $request->input('pesquisa');

        // Verificando se há pesquisa
        if(!$pesquisa)
        {
            return response()->json(['message'=>'Receita não necontrada!'], 404);
        }

        // Procurando pela pesquisa
        $receita = Receita::where('titulo', 'like', '%' . $pesquisa . '%')->first();

        if(!$receita)
        {
            return response()->json(['message'=>'Receita não encontrada!'], 404);
        }

        return response()->json($receita, 200);
    }

    public function index(Request $request)
    {
        // Rota com Parâmetros
        if ($request->input('destaque') || $request->input('categoria')) {
            return $this->initialPage($request);
        }

        if($request->input('pesquisa')) {
            return $this->search($request);
        }

        return response()->json(Receita::all(), 200);
    }

    public function store(Request $request)
    {
        $usuario = $this->validUser($request);

        if(!$usuario)
        {
            return response()->json(['message' => 'Usuário não autenticado.'], 401);
        }

        try {
            $validatedData = $request->validate([
                'usuario_id' => 'required|exists:usuarios,id|min:1',
                'titulo' => 'required|string|min:10',
                'categoria' => 'required|string',
                'ingredientes' => 'required|string',
                'modo_de_preparo' => 'required|string',
                'tempo_de_preparo' => 'required|string|min:3',
                'imagem' => 'required|file|mimes:jpg,png,pdf',
            ],[
                'usuario_id.exists' => 'O usuário selecionado não existe.',
                'usuario_id.required' => 'O campo usuario_id deve ser preenchido.',
                'titulo.string' => 'O título deve ser um texto.',
                'titulo.required' => 'O campo título deve ser preenchido.',
                'categoria.string' => 'O campo categoria deve ser um texto.',
                'categoria.required' => 'O campo categoria deve ser preenchido.',
                'ingredientes.required' => 'O campo ingredientes devem ser preenchido.',
                'ingredientes.string' => 'O campo ingredientes deve ser uma string: "Maçã: 3 unidades, Farinha: 5kg, ...".',
                'modo_de_preparo.required' => 'O campo modo_de_preparo de ser preenchido.',
                'modo_de_preparo.string' => 'O campo modo de preparo deve ser uma string: "1. Bata, 2. Coma".',
                'tempo_de_preparo.required' => 'O campo tempo de preparo deve ser preenchido.',
                'tempo_de_preparo.string' => 'O campo tempo de preparo deve ser uma string: 1 hora, 30 minutos, 3 dias...',
                'imagem.required' => 'O arquivo imagem deve ser preenchido.',
            ]);

            // Verificando se o usuário que está criando a receita é o mesmo do usuario_id
            if($usuario->id != $request->usuario_id)
            {
                return response()->json(['message' => 'Usuário não autorizado.'], 403);
            }

            Receita::create([
                'usuario_id' => $request->usuario_id,
                'titulo' => $request->titulo,
                'categoria' => $request->categoria,
                'ingredientes' => $request->ingredientes,
                'modo_de_preparo' => $request->modo_de_preparo,
                'tempo_de_preparo' => $request->tempo_de_preparo,
                'imagem' => $request->file('imagem')->get()
            ]);   

            return response()->json('', 201);
        } catch (ValidationException $e) {
            return response()->json(['message'=> 'Erro de validação', 'errors' => $e->errors()], 422);
        }
    }

    public function show($id)
    {
        $receita = Receita::find($id);

        if(!$receita)
        {
            return response()->json(['message' => 'Receita não encontrada.','found' => false], 404);
        }

        return response()->json(['info' => $receita, 'img' => base64_encode($receita->imagem), 'found' => true], 200);
    }
    
    public function update(Request $request, $id)
    {
        $usuario = $this->validUser($request);

        if(!$usuario)
        {
            return response()->json(['message' => 'Usuário não autenticado.'], 401);
        }

        $receita = Receita::find($id);

        if(!$receita)
        {
            return response()->json(['message' => 'Receita não encontrada.'], 404);
        }

        try {
            $validatedData = $request->validate([
                'usuario_id' => 'required|exists:usuarios,id|min:1',
                'titulo' => 'required|string|min:10',
                'categoria' => 'required|string',
                'ingredientes' => 'required|string',
                'modo_de_preparo' => 'required|string',
                'tempo_de_preparo' => 'required|string|min:3',
            ],[
                'usuario_id.exists' => 'O usuário selecionado não existe.',
                'usuario_id.required' => 'O campo usuario_id deve ser preenchido.',
                'titulo.string' => 'O título deve ser um texto.',
                'titulo.required' => 'O campo título deve ser preenchido.',
                'categoria.string' => 'O campo categoria deve ser um texto.',
                'categoria.required' => 'O campo categoria deve ser preenchido.',
                'ingredientes.required' => 'O campo ingredientes devem ser preenchido.',
                'ingredientes.string' => 'O campo ingredientes deve ser uma string: "Maçã: 3 unidades, Farinha: 5kg, ...".',
                'modo_de_preparo.required' => 'O campo modo_de_preparo de ser preenchido.',
                'modo_de_preparo.string' => 'O campo modo de preparo deve ser uma string: "1. Bata, 2. Coma".',
                'tempo_de_preparo.required' => 'O campo tempo de preparo deve ser preenchido.',
                'tempo_de_preparo.string' => 'O campo tempo de preparo deve ser uma string: 1 hora, 30 minutos, 3 dias...',
            ]);

            // Verificando se o usuário que está criando a receita é o mesmo do usuario_id
            if($usuario->id != $request->usuario_id)
            {
                return response()->json(['message' => 'Usuário não autorizado.'], 403);
            }

            // Usuários não podem alterar o dono da receita
            if($receita->usuario_id != $request->usuario_id)
            {
                return response()->json(['message' => 'Usuário não autorizado..'], 403);
            }

            $imagem = $request->file('imagem');
            if(!$imagem) {
                $imagem = $receita->imagem;
            } else {
                $imagem = $imagem->get();
            }

            $receita->update([
                'usuario_id' => $request->usuario_id,
                'titulo' => $request->titulo,
                'categoria' => $request->categoria,
                'ingredientes' => $request->ingredientes,
                'modo_de_preparo' => $request->modo_de_preparo,
                'tempo_de_preparo' => $request->tempo_de_preparo,
                'imagem' => $imagem,
            ]);   

            return response()->json('', 200);
        } catch(ValidationException $e) {
            return response()->json(['message'=> 'Erro de validação', 'errors' => $e->errors()], 422);
        }
    }

    public function destroy(Request $request, $id)
    {
        $usuario = $this->validUser($request);

        if(!$usuario)
        {
            return response()->json(['message' => 'Usuário não autenticado.'], 401);
        }

        $receita = Receita::find($id);

        if(!$receita)
        {
            return response()->json(['message' => 'Receita não encontrada.'], 404);
        }

        // Verificando se o usuário que está alterando a receita é o mesmo do usuario_id
        if($usuario->id != $receita->usuario_id)
        {
            return response()->json(['message' => 'Usuário não autorizado..'], 403);
        }

        $receita->delete();

        return response()->json('',201);
    }

    // Função auxiliar para calcular média de receita na categoria
    public function medium($receita_id)
    {
        $avaliacao = Avaliacao::where('receita_id', $receita_id)->get();
        
        $media = 0;
        for($i = 0 ;$i < count($avaliacao); $i++)
        {
            $media += $avaliacao[$i]->estrelas/count($avaliacao);
        } 

        return number_format($media,2);
    }

    // Essa função retorna todas as receitas de uma categoria
    public function categoria($categoria)
    {
        $receitas = Receita::where('categoria', $categoria)->get();
        
        for($i = 0; $i < count($receitas); $i++) {
            $receitas[$i]->avaliacao = $this->medium($receitas[$i]->id);
            $receitas[$i]->img = base64_encode($receitas[$i]->imagem);
        }
        
        return $receitas;
    }

    // Essa função coleta um id aleatórios
    public function destaque() 
    {
        // Coletando a quantidade de receitas disponíveis
        $receita = Receita::inRandomOrder()->first();
        $receita->avaliacao = $this->medium($receita->id);
        $receita->img = base64_encode($receita->imagem);

        return $receita;
    }
    
    // Essa função realizará a requisição da página inicial
    public function initialPage(Request $request) 
    {
        // Coletando o Destaque
        $destaque = $request->input("destaque");

        if($destaque && $destaque == "true") {
            $destaque = $this->destaque();
        } else {
            $destaque = null;
        }

        // Coletando as Categorias
        $categoriasInput = $request->input("categorias");
        
        if($categoriasInput) {
            $categorias = [];
            $categoriasInput = explode(",", $categoriasInput);
            for($i = 0; $i < count($categoriasInput); $i++) {
                $categorias[$categoriasInput[$i]] = $this->categoria($categoriasInput[$i]);
            }
        }

        return response()->json(['destaque' => $destaque, 'categorias' => $categorias],200);
    }
}