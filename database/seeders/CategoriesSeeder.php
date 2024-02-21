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
            'name' => 'Categoria 1',
            'description' => 'Descripción de la categoría 1',
        ]);

        Category::create([
            'name' => 'Categoria 2',
            'description' => 'Descripción de la categoría 2',
        ]);
    }
}
