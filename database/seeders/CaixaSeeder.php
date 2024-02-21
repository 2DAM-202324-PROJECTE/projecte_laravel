<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaixaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caixa::create([
            'name' => 'Caixa 1',
            'description' => 'Caixa 1',
            'url' => 'https://www.caixa1.com',
        ]);
        Caixa::create([
            'name' => 'Caixa 2',
            'description' => 'Caixa 2',
            'url' => 'https://www.caixa2.com',
        ]);
        Caixa::create([
            'name' => 'Caixa 3',
            'description' => 'Caixa 3',
            'url' => 'https://www.caixa3.com',
        ]);
        Caixa::create([
            'name' => 'Caixa 4',
            'description' => 'Caixa 4',
            'url' => 'https://www.caixa4.com',
        ]);
        Caixa::create([
            'name' => 'Caixa 5',
            'description' => 'Caixa 5',
            'url' => 'https://www.caixa5.com',
        ]);
        //
    }
}
