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
            'email' => 'admin@test.net',
            'password' => Hash::make('admin')]);
        User::create([
            'name' => 'user',
            'role_id' => 2, // 'user' role
            'email' => 'user@admin.test',
            'password' => Hash::make('user')]);

        User::create([
            'name' => 'admin',
            'role_id' => 3, // 'suscriptor' role
            'email' => 'admin@teamflix.com',
            'password' => Hash::make('admin')]);

        User::create([
            'name' => 'sergio',
            'email' => 'sergio@teamflix.com',
            'password' => Hash::make('sergio')]);

    }
}
