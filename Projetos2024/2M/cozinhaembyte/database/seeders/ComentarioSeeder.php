<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            [
                'usuario_id' => 1,
                'receita_id' => 3,
                'texto' => 'Ótima receita!',
                'created_at' => Carbon::parse('2024-01-01 12:00:00'),
                'updated_at' => Carbon::parse('2024-01-01 12:00:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 7,
                'texto' => 'Fiz aqui em casa, ficou uma delícia!',
                'created_at' => Carbon::parse('2024-01-05 15:30:00'),
                'updated_at' => Carbon::parse('2024-01-05 15:30:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 1,
                'texto' => 'Muito gostosa!',
                'created_at' => Carbon::parse('2024-01-10 09:45:00'),
                'updated_at' => Carbon::parse('2024-01-10 09:45:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 5,
                'texto' => 'Super fácil de fazer!',
                'created_at' => Carbon::parse('2024-01-12 18:20:00'),
                'updated_at' => Carbon::parse('2024-01-12 18:20:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 12,
                'texto' => 'Aqui em casa todos adoraram!',
                'created_at' => Carbon::parse('2024-01-15 20:10:00'),
                'updated_at' => Carbon::parse('2024-01-15 20:10:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 2,
                'texto' => 'Perfeita para o fim de semana!',
                'created_at' => Carbon::parse('2024-01-18 11:30:00'),
                'updated_at' => Carbon::parse('2024-01-18 11:30:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 10,
                'texto' => 'Simples e saborosa!',
                'created_at' => Carbon::parse('2024-01-20 14:40:00'),
                'updated_at' => Carbon::parse('2024-01-20 14:40:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 6,
                'texto' => 'Receita maravilhosa!',
                'created_at' => Carbon::parse('2024-01-22 10:50:00'),
                'updated_at' => Carbon::parse('2024-01-22 10:50:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 8,
                'texto' => 'Aprovadíssima!',
                'created_at' => Carbon::parse('2024-01-25 08:15:00'),
                'updated_at' => Carbon::parse('2024-01-25 08:15:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 4,
                'texto' => 'Receita prática e deliciosa!',
                'created_at' => Carbon::parse('2024-01-28 16:05:00'),
                'updated_at' => Carbon::parse('2024-01-28 16:05:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 11,
                'texto' => 'Com certeza farei de novo!',
                'created_at' => Carbon::parse('2024-01-30 13:55:00'),
                'updated_at' => Carbon::parse('2024-01-30 13:55:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 9,
                'texto' => 'Muito boa!',
                'created_at' => Carbon::parse('2024-02-02 07:30:00'),
                'updated_at' => Carbon::parse('2024-02-02 07:30:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 7,
                'texto' => 'Amei o resultado!',
                'created_at' => Carbon::parse('2024-02-05 17:45:00'),
                'updated_at' => Carbon::parse('2024-02-05 17:45:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 3,
                'texto' => 'Excelente para qualquer ocasião!',
                'created_at' => Carbon::parse('2024-02-07 19:00:00'),
                'updated_at' => Carbon::parse('2024-02-07 19:00:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 1,
                'texto' => 'Receita fácil e deliciosa!',
                'created_at' => Carbon::parse('2024-02-10 21:30:00'),
                'updated_at' => Carbon::parse('2024-02-10 21:30:00'),
            ],
        ]);        
    }
}
