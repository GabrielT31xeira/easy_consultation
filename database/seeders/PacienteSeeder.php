<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('paciente')->insert([
            'nome' => 'Gabriel',
            'cpf' => '123.123.123-23',
            'celular' => '63984737666'
        ]);

        DB::table('paciente')->insert([
            'nome' => 'Isaque',
            'cpf' => '124.123.123-23',
            'celular' => '63984737666'
        ]);

        DB::table('paciente')->insert([
            'nome' => 'Heitor',
            'cpf' => '125.123.123-23',
            'celular' => '63984737666'
        ]);
    }
}
