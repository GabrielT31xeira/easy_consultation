<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cidades')->insert([
            'nome' => 'Palmas',
            'estado' => 'Tocantins',
        ]);

        DB::table('cidades')->insert([
            'nome' => 'Goiania',
            'estado' => 'Goias',
        ]);

        DB::table('cidades')->insert([
            'nome' => 'Araguaina',
            'estado' => 'Tocantins',
        ]);
    }
}
