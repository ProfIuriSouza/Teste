<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ReceitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receitas')->insert([
            [
                'usuario_id' => 1,
                'titulo' => 'Bolo de Maçã',
                'categoria' => 'Doces',
                'imagem' => file_get_contents(public_path('img/bolo-de-maca.jpeg')),
                'ingredientes' => "Maçã: 3 unidades, Farinha: 2 xícaras, Açúcar: 1 xícara, Ovos: 2 unidades, Fermento: 1 colher de sopa",
                'modo_de_preparo' => "Pré-aqueça o forno, Misture todos os ingredientes, Asse por 40 minutos a 180°C",
                'tempo_de_preparo' => '1 hora',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 1,
                'titulo' => 'Brigadeiro Gourmet',
                'categoria' => 'Doces',
                'imagem' => file_get_contents(public_path('img/brigadeiro-gourmet.jpg')),
                'ingredientes' => "Leite Condensado: 1 lata, Chocolate Amargo: 100g, Manteiga: 1 colher de sopa, Creme de Leite: 2 colheres de sopa, Granulado Gourmet: 100g",
                'modo_de_preparo' => "Derreta a manteiga em fogo baixo, Adicione o leite condensado e o chocolate picado, Misture até desgrudar do fundo da panela, Adicione o creme de leite e misture bem, Deixe esfriar, Modele em bolinhas e passe no granulado.",
                'tempo_de_preparo' => '40 minutos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            [
                'usuario_id' => 1,
                'titulo' => 'Pudim de Leite Condensado',
                'categoria' => 'Doces',
                'imagem' => file_get_contents(public_path('img/pudim-de-leite-condensado.jpg')),
                'ingredientes' => "Leite Condensado: 1 lata, Leite: 2 latas (medida do leite condensado), Ovos: 3 unidades, Açúcar: 1 xícara (para a calda)",
                'modo_de_preparo' => "Derreta o açúcar em uma panela até formar uma calda dourada, Espalhe a calda em uma forma de pudim, Bata no liquidificador o leite condensado, o leite e os ovos, Despeje a mistura na forma, Asse em banho-maria por 1 hora e meia a 180°C, Deixe esfriar e desenforme.",
                'tempo_de_preparo' => '2 horas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 2,
                'titulo' => 'Arroz com Feijão',
                'categoria' => 'Almoço',
                'imagem' => file_get_contents(public_path('img/arroz-com-feijao.jpg')),
                'ingredientes' => "Arroz: 1 xícara, Feijão: 1 xícara, Água: 4 xícaras, Sal: a gosto, Alho: 1 dente",
                'modo_de_preparo' => "Cozinhe o feijão, Refogue o alho e junte o arroz, Cozinhe o arroz e feijão juntos",
                'tempo_de_preparo' => '45min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 2,
                'titulo' => 'Tournedos Rossini',
                'categoria' => 'Almoço',
                'imagem' => file_get_contents(public_path('img/tournedos.png')),
                'ingredientes' => "Filé Mignon: 740g, Batata inglesa: 2 unidades, Ovo: 1 unidade, Manteiga: 115g, Espinafre: 20 unidades",
                'modo_de_preparo' => "Cozinhe o feijão, Refogue o alho e junte o arroz, Cozinhe o arroz e feijão juntos",
                'tempo_de_preparo' => '60min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 3,
                'titulo' => 'Abobrinha Recheada',
                'categoria' => 'Almoço',
                'imagem' => file_get_contents(public_path('img/abobrinha.jpg')),
                'ingredientes' => "Abobrinhas: 4 unidades, Alho: 2 unidades, Carne moída: 300g, Bacon: 100g, Tomate: 2 unidades, Queijo Parmesão ralado: 50g, Cheiro Verde: 1 unidade, Pimenta do reino: a gosto, Sal: a gosto",
                'modo_de_preparo' => "Corte as abobrinhas ao meio, no sentido do comprimento, Cozinhe as abobrinhas em água fervente com sal, Prepare o recheio e refogue a cebola e o alho com um pouco de óleo,
                Acrescente o bacon e deixe fritar bem, Adicione a carne moída, a pimenta-do-reino e o sal, Acrescente o tomate e a polpa picada da abobrinha e deixe apurar,
                Por último saplique um pouco de cheiro verde",
                'tempo_de_preparo' => '40min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 3,
                'titulo' => 'Torta de Limão',
                'categoria' => 'Doces',
                'imagem' => file_get_contents(public_path('img/torta-de-limao.jpg')),
                'ingredientes' => "Biscoito: 200g, Manteiga: 100g, Leite condensado: 1 lata, Limão: 3 unidades, Creme de leite: 1 lata",
                'modo_de_preparo' => "Triture os biscoitos e misture com a manteiga, Recheie com leite condensado e limão, Deixe gelar por 2 horas",
                'tempo_de_preparo' => '2 horas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 4,
                'titulo' => 'Salada de Frutas',
                'categoria' => 'Lanches',
                'imagem' => file_get_contents(public_path('img/salada-de-frutas.jpg')),
                'ingredientes' => "Maçã: 1 unidade, Banana: 1 unidade, Morango: 5 unidades, Laranja: 1 unidade, Mel: a gosto",
                'modo_de_preparo' => "Corte todas as frutas, Misture em uma tigela, Adicione mel a gosto",
                'tempo_de_preparo' => '10min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 5,
                'titulo' => 'Feijoada',
                'categoria' => 'Jantar',
                'imagem' => file_get_contents(public_path('img/feijoada.jpg')),
                'ingredientes' => "Feijão preto: 500g, Linguiça: 300g, Bacon: 200g, Carne seca: 300g, Sal: a gosto",
                'modo_de_preparo' => "Cozinhe o feijão, Frite a linguiça e o bacon, Misture tudo e cozinhe por mais 30 minutos",
                'tempo_de_preparo' => '3 horas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 1,
                'titulo' => 'Pão Caseiro',
                'categoria' => 'Lanches',
                'imagem' => file_get_contents(public_path('img/pao-caseiro.jpg')),
                'ingredientes' => "Farinha: 500g, Fermento biológico: 10g, Água: 300ml, Sal: 1 colher de chá, Açúcar: 1 colher de sopa",
                'modo_de_preparo' => "Misture os ingredientes, Deixe a massa crescer por 1 hora, Asse por 30 minutos a 200°C",
                'tempo_de_preparo' => '2 horas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 2,
                'titulo' => 'Strogonoff de Frango',
                'categoria' => 'Almoço',
                'imagem' => file_get_contents(public_path('img/estrogonofe-de-frango.jpg')),
                'ingredientes' => "Frango: 500g, Creme de leite: 1 caixa, Ketchup: 3 colheres de sopa, Mostarda: 1 colher de sopa, Champignon: 100g",
                'modo_de_preparo' => "Corte o frango e refogue, Adicione o creme de leite, ketchup e mostarda, Misture tudo e sirva",
                'tempo_de_preparo' => '30min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 3,
                'titulo' => 'Panqueca',
                'categoria' => 'Lanches',
                'imagem' => file_get_contents(public_path('img/panqueca.jpg')),
                'ingredientes' => "Leite: 1 xícara, Ovos: 2 unidades, Farinha de trigo: 1 xícara, Sal: a gosto",
                'modo_de_preparo' => "Bata todos os ingredientes, Despeje a massa na frigideira, Cozinhe até dourar dos dois lados",
                'tempo_de_preparo' => '20min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 4,
                'titulo' => 'Sopa de Legumes',
                'categoria' => 'Jantar',
                'imagem' => file_get_contents(public_path('img/sopa-de-legumes.jpg')),
                'ingredientes' => "Batata: 2 unidades, Cenoura: 1 unidade, Abobrinha: 1 unidade, Água: 1 litro, Sal: a gosto",
                'modo_de_preparo' => "Corte os legumes, Cozinhe em água por 30 minutos, Tempere com sal a gosto",
                'tempo_de_preparo' => '40min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 5,
                'titulo' => 'Lasanha de Carne',
                'categoria' => 'Jantar',
                'imagem' => file_get_contents(public_path('img/lasanha-de-carne.jpg')),
                'ingredientes' => "Massa de lasanha: 500g, Carne moída: 500g, Molho de tomate: 1 lata, Queijo mussarela: 300g, Parmesão ralado: 50g",
                'modo_de_preparo' => "Cozinhe a carne moída com o molho, Monte camadas com massa, carne e queijo, Asse por 30 minutos",
                'tempo_de_preparo' => '1 hora',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 5,
                'titulo' => 'Escondidinho de Carne',
                'categoria' => 'Jantar',
                'imagem' => file_get_contents(public_path('img/escondidinho.jpg')),
                'ingredientes' => "Macaxeira: 500g, Carne moída: 500g, Molho de tomate: 1 lata, Queijo mussarela: 300g, Parmesão ralado: 50g, Creme de Leite: 1 unidade, Leite: 0.5L",
                'modo_de_preparo' => "Cozinhe a carne moída com o molho, Cozinhe as macaxeiras na panela de pressão, Ferva a macaxeira amassada com o creme de leite no fogo até formar a textura de purê, Monte as camadas numa travessa alternando entre purê e carne, Coloque os queijos por cima, Leve ao forno por 15 minutos para derreter o queijo",
                'tempo_de_preparo' => '1 hora',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 1,
                'titulo' => 'Brigadeiro',
                'categoria' => 'Doces',
                'imagem' => file_get_contents(public_path('img/brigadeiro.jpg')),
                'ingredientes' => "Leite condensado: 1 lata, Manteiga: 1 colher de sopa, Chocolate em pó: 3 colheres de sopa, Granulado: a gosto",
                'modo_de_preparo' => "Misture o leite condensado, manteiga e chocolate, Cozinhe até engrossar, Modele e passe no granulado",
                'tempo_de_preparo' => '30min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 2,
                'titulo' => 'Omelete',
                'categoria' => 'Lanches',
                'imagem' => file_get_contents(public_path('img/omelete.jpg')),
                'ingredientes' => "Ovos: 3 unidades, Sal: a gosto, Queijo: 50g, Presunto: 50g, Cebolinha: a gosto",
                'modo_de_preparo' => "Bata os ovos com sal, Adicione o queijo, presunto e cebolinha, Cozinhe em uma frigideira até dourar",
                'tempo_de_preparo' => '15min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 4,
                'titulo' => 'Crepioca',
                'categoria' => 'Lanches',
                'imagem' => file_get_contents(public_path('img/crepioca.jpg')),
                'ingredientes' => "Ovos: w unidades, Sal: a gosto, Queijo: 50g, Presunto: 50g, Cebolinha: a gosto, Calabresa: 50g",
                'modo_de_preparo' => "Bata os ovos com sal, Adicione o queijo, presunto, cebolinha e calabresa, Cozinhe em uma frigideira até dourar",
                'tempo_de_preparo' => '15min',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        
    }
}
