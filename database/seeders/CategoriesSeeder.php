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
            'name' => 'Pel·lícules',
            'description' => 'Descripció de la categoría 1',
        ]);

        Category::create([
            'name' => 'Documentals',
            'description' => 'Descripció de la categoría 2',
        ]);
    }
}
