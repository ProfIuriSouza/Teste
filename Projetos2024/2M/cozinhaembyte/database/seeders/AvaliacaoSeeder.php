<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AvaliacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avaliacoes')->insert([
            [
                'usuario_id' => 1,
                'receita_id' => 1,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-01 12:00:00'),
                'updated_at' => Carbon::parse('2024-01-01 12:00:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 1,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-02 09:00:00'),
                'updated_at' => Carbon::parse('2024-01-02 09:00:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 1,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-01-03 14:30:00'),
                'updated_at' => Carbon::parse('2024-01-03 14:30:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 2,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-04 11:20:00'),
                'updated_at' => Carbon::parse('2024-01-04 11:20:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 2,
                'estrelas' => 2,
                'created_at' => Carbon::parse('2024-01-05 16:45:00'),
                'updated_at' => Carbon::parse('2024-01-05 16:45:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 2,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-06 18:00:00'),
                'updated_at' => Carbon::parse('2024-01-06 18:00:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 3,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-07 10:00:00'),
                'updated_at' => Carbon::parse('2024-01-07 10:00:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 3,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-01-08 15:30:00'),
                'updated_at' => Carbon::parse('2024-01-08 15:30:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 3,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-09 08:10:00'),
                'updated_at' => Carbon::parse('2024-01-09 08:10:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 4,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-01-10 14:00:00'),
                'updated_at' => Carbon::parse('2024-01-10 14:00:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 4,
                'estrelas' => 2,
                'created_at' => Carbon::parse('2024-01-11 12:20:00'),
                'updated_at' => Carbon::parse('2024-01-11 12:20:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 4,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-12 16:30:00'),
                'updated_at' => Carbon::parse('2024-01-12 16:30:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 5,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-13 11:15:00'),
                'updated_at' => Carbon::parse('2024-01-13 11:15:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 5,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-01-14 13:50:00'),
                'updated_at' => Carbon::parse('2024-01-14 13:50:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 5,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-15 18:25:00'),
                'updated_at' => Carbon::parse('2024-01-15 18:25:00'),
            ],
        ]);

        DB::table('avaliacoes')->insert([
            [
                'usuario_id' => 1,
                'receita_id' => 6,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-16 14:00:00'),
                'updated_at' => Carbon::parse('2024-01-16 14:00:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 6,
                'estrelas' => 2,
                'created_at' => Carbon::parse('2024-01-17 09:30:00'),
                'updated_at' => Carbon::parse('2024-01-17 09:30:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 6,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-18 16:45:00'),
                'updated_at' => Carbon::parse('2024-01-18 16:45:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 7,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-19 10:15:00'),
                'updated_at' => Carbon::parse('2024-01-19 10:15:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 7,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-01-20 14:30:00'),
                'updated_at' => Carbon::parse('2024-01-20 14:30:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 7,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-21 11:45:00'),
                'updated_at' => Carbon::parse('2024-01-21 11:45:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 8,
                'estrelas' => 1,
                'created_at' => Carbon::parse('2024-01-22 08:00:00'),
                'updated_at' => Carbon::parse('2024-01-22 08:00:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 8,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-23 15:20:00'),
                'updated_at' => Carbon::parse('2024-01-23 15:20:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 8,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-01-24 12:35:00'),
                'updated_at' => Carbon::parse('2024-01-24 12:35:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 9,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-25 13:50:00'),
                'updated_at' => Carbon::parse('2024-01-25 13:50:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 9,
                'estrelas' => 2,
                'created_at' => Carbon::parse('2024-01-26 17:00:00'),
                'updated_at' => Carbon::parse('2024-01-26 17:00:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 9,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-27 09:10:00'),
                'updated_at' => Carbon::parse('2024-01-27 09:10:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 10,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-01-28 14:25:00'),
                'updated_at' => Carbon::parse('2024-01-28 14:25:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 10,
                'estrelas' => 2,
                'created_at' => Carbon::parse('2024-01-29 15:45:00'),
                'updated_at' => Carbon::parse('2024-01-29 15:45:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 10,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-01-30 18:05:00'),
                'updated_at' => Carbon::parse('2024-01-30 18:05:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 11,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-01-31 08:15:00'),
                'updated_at' => Carbon::parse('2024-01-31 08:15:00'),
            ],
            [
                'usuario_id' => 2,
                'receita_id' => 11,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-02-01 10:20:00'),
                'updated_at' => Carbon::parse('2024-02-01 10:20:00'),
            ],
            [
                'usuario_id' => 3,
                'receita_id' => 11,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-02-02 13:30:00'),
                'updated_at' => Carbon::parse('2024-02-02 13:30:00'),
            ],
            [
                'usuario_id' => 4,
                'receita_id' => 12,
                'estrelas' => 3,
                'created_at' => Carbon::parse('2024-02-03 11:40:00'),
                'updated_at' => Carbon::parse('2024-02-03 11:40:00'),
            ],
            [
                'usuario_id' => 5,
                'receita_id' => 12,
                'estrelas' => 4,
                'created_at' => Carbon::parse('2024-02-04 09:55:00'),
                'updated_at' => Carbon::parse('2024-02-04 09:55:00'),
            ],
            [
                'usuario_id' => 1,
                'receita_id' => 12,
                'estrelas' => 5,
                'created_at' => Carbon::parse('2024-02-05 14:20:00'),
                'updated_at' => Carbon::parse('2024-02-05 14:20:00'),
            ],
        ]);        
    }
}
