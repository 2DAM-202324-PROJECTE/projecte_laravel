<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'role_id' => 1, // 'admin' role
            'email' => 'admin@test.net', // 'admin.jpg' is in 'public/images' folder
            'password' => Hash::make('admin'),
            'ruta_foto' => 'admin.jpg']);
        User::create([
            'name' => 'user',
            'role_id' => 2, // 'user' role
            'email' => 'user@admin.test',
            'password' => Hash::make('user'),
            'ruta_foto' => 'admin.jpg']);

        User::create([
            'name' => 'suscriptor',
            'role_id' => 3, // 'suscriptor' role
            'email' => 'sub@teamflix.com',
            'password' => Hash::make('admin'),
            'ruta_foto' => 'admin.jpg']);

        User::create([
            'name' => 'sergio',
            'role_id' => 1, // 'admin' role
            'email' => 'sergio@teamflix.com',
            'password' => Hash::make('sergio'),
            'ruta_foto' => 'admin.jpg']);

    }
}
