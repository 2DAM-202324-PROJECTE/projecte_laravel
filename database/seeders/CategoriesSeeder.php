<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'nom' => 'Categoria 1',
            'descripcio' => 'Descripción de la categoría 1',
        ]);

        Category::create([
            'nom' => 'Categoria 2',
            'descripcio' => 'Descripción de la categoría 2',
        ]);
    }
}
