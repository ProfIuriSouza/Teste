<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nome' => 'Alice Santos',
                'email' => 'alice.santos@gmail.com',
                'senha' => Hash::make('alice1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Bruno Costa',
                'email' => 'bruno.costa@gmail.com',
                'senha' => Hash::make('bruno_678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Carla Silva',
                'email' => 'carla.silva@gmail.com',
                'senha' => Hash::make('carlinha_maia12'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Daniel Oliveira',
                'email' => 'daniel.oliveira@gmail.com',
                'senha' => Hash::make('SenhaForte1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Elaine Mendes',
                'email' => 'elaine.mendes@gmail.com',
                'senha' => Hash::make('Deusehfiel'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        
    }
}
