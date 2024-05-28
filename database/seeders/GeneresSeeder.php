<?php

namespace Database\Seeders;

use App\Models\Genere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genere::create([
            'name' => 'Por',
            'description' => 'Descripció de la categoría 1',
        ]);

        Genere::create([
            'name' => 'Comedia',
            'description' => 'Descripció de la categoría 2',
        ]);
    }
}
