<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
            [
                'nome' => 'Pedro da Silva',
                'email' => 'pedro@email.com',
                'endereco' => 'MANAUS',
                'logradouro' => 'RUA FERREIRA PENA',
                'cep' => '69010-110',
                'bairro' => 'CENTRO',
            ]
        );
    }
}
