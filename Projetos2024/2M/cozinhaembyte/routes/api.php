<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\AvaliacaoController;

Route::options('{any}', function () {
    return response('', 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, Accept');
})->where('any', '.*');

/* ROTAS PRIVADAS */

// Grupo com Middleware auth:sanctum
Route::group(['middleware' => 'auth:sanctum'], function() {
    // Laravel Sancutm
    Route::post('logout/', [AuthController::class, 'logout']);
    
    // Usuários
    // Route::post('usuarios/', [UsuarioController::class, 'store']);
    Route::put('usuarios/{id}', [UsuarioController::class, 'update']);
    Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']);
    
    // Receitas
    Route::post('receitas/', [ReceitaController::class, 'store']);
    Route::put('receitas/{id}', [ReceitaController::class, 'update']);
    Route::delete('receitas/{id}', [ReceitaController::class, 'destroy']);
    
    // Comentários
    Route::post('comentarios/', [ComentarioController::class, 'store']);
    Route::put('comentarios/{usuario_id}/{receita_id}', [ComentarioController::class, 'update']);
    Route::delete('comentarios/{usuario_id}/{receita_id}', [ComentarioController::class, 'destroy']);
    
    // Avaliações (Estrelas)
    Route::post('avaliacoes/', [AvaliacaoController::class, 'store']);
    Route::put('avaliacoes/{usuario_id}/{receita_id}', [AvaliacaoController::class, 'update']);
    Route::delete('avaliacoes/{usuario_id}/{receita_id}', [AvaliacaoController::class, 'destroy']);
});

/* ROTAS PÚBLICAS */

// Laravel Sanctum (Autenticação de Usuários)
Route::post('register/', [AuthController::class, 'register']);
Route::post('login/', [AuthController::class, 'login'])->name('login');
Route::post('isAuthenticated/', [AuthController::class, 'isAuthenticated']);

// Rotas de Usuário
Route::get('usuarios/', [UsuarioController::class, 'index']);
Route::get('usuarios/{id}', [UsuarioController::class, 'show']);

// Rotas de Receita
Route::get('receitas/', [ReceitaController::class, 'index']);
Route::get('receitas/{id}', [ReceitaController::class, 'show']);

// Rotas dos Comentários
Route::get('comentarios/', [ComentarioController::class, 'index']);
Route::get('comentarios/{usuario_id}/{receita_id}', [ComentarioController::class, 'show']);
Route::get('comentarios/{receita_id}', [ComentarioController::class, 'receita']);

// Rotas das Avaliações
Route::get('avaliacoes/', [AvaliacaoController::class, 'index']);
Route::get('avaliacoes/{usuario_id}/{receita_id}', [AvaliacaoController::class, 'show']);
Route::get('avaliacoes/{receita_id}', [AvaliacaoController::class, 'medium']);