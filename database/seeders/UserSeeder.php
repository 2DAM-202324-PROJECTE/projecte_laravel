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
            'email' => 'admin@test.net',
            'password' => Hash::make('admin')]);
        User::create([
            'name' => 'user',
            'email' => 'user@admin.test',
            'password' => Hash::make('user')]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@teamflix.com',
            'password' => Hash::make('admin')]);

    }
}
