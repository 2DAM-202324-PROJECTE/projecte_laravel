<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Xat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

       // $this->call([CategoriesSeeder::class, UserSeeder::class, MediaSeeder::class, XatSeeder::class, UserXatSeeder::class]);

    }
}
