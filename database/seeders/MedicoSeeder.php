<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medico')->insert([
            'nome' => 'Gabriel',
            'especialidade' => 'Cardiologista',
            'cidades_id' => 1
        ]);

        DB::table('medico')->insert([
            'nome' => 'Heitor',
            'especialidade' => 'Pediatra',
            'cidades_id' => 2
        ]);

        DB::table('medico')->insert([
            'nome' => 'Rafael',
            'especialidade' => 'Neurologista',
            'cidades_id' => 3
        ]);

        DB::table('medico')->insert([
            'nome' => 'Isaque',
            'especialidade' => 'Neurologista',
            'cidades_id' => 1
        ]);
    }
}
