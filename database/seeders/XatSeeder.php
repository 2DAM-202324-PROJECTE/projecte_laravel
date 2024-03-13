<?php

namespace Database\Seeders;

use App\Models\Xat;
use Illuminate\Database\Seeder;

class XatSeeder extends Seeder
{
    public function run(): void
    {
        Xat::create([
            'nom' => 'Xat de prova',
            'descripcio' => 'Xat de prova',
            'usuari_id' => 1,
            'url' => null, // O asigna un valor si corresponde
            'password' => null, // O asigna un valor si corresponde
            'foto' => null, // O asigna un valor si corresponde
            'tipus' => 'general', // Asume un valor predeterminado, ajusta según tus necesidades
            'privacitat' => 'pública', // Asume un valor predeterminado, ajusta según tus necesidades
            'idioma' => 'Català', // Asume un valor predeterminado, ajusta según tus necesidades
        ]);
        Xat::create([
            'nom' => 'Xat de prova2',
            'descripcio' => 'Xat de prova2',
            'usuari_id' => 2,
            'url' => null, // O asigna un valor si corresponde
            'password' => null, // O asigna un valor si corresponde
            'foto' => null, // O asigna un valor si corresponde
            'tipus' => 'general', // Asume un valor predeterminado, ajusta según tus necesidades
            'privacitat' => 'pública', // Asume un valor predeterminado, ajusta según tus necesidades
            'idioma' => 'Català', // Asume un valor predeterminado, ajusta según tus necesidades
        ]);

        Xat::create([
            'nom' => 'Xat de prova1',
            'descripcio' => 'Xat de prova1',
            'usuari_id' => 1,
            'url' => null, // O asigna un valor si corresponde
            'password' => null, // O asigna un valor si corresponde
            'foto' => null, // O asigna un valor si corresponde
            'tipus' => 'general', // Asume un valor predeterminado, ajusta según tus necesidades
            'privacitat' => 'pública', // Asume un valor predeterminado, ajusta según tus necesidades
            'idioma' => 'Català', // Asume un valor predeterminado, ajusta según tus necesidades

        ]);
    }
}
