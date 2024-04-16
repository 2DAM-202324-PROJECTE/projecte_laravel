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
            'media_id' => 1,
            'creador_id' => 1,
            'url' => null, // O asigna un valor si corresponde
            'password' => null, // O asigna un valor si corresponde
            'foto' => null, // O asigna un valor si corresponde
            'tipus' => 'general', // Asume un valor predeterminado, ajusta según tus necesidades
            'privacitat' => 'pública', // Asume un valor predeterminado, ajusta según tus necesidades
            'idioma' => 'Catala', // Asume un valor predeterminado, ajusta según tus necesidades
        ]);
        Xat::create([
            'nom' => 'Xat de prova2',
            'descripcio' => 'Xat de prova2',
            'media_id' => 1, // Asegúrate de que 'media_id' es una propiedad pública en tu componente
            'creador_id' => 2,
            'url' => null, // O asigna un valor si corresponde
            'password' => null, // O asigna un valor si corresponde
            'foto' => null, // O asigna un valor si corresponde
            'tipus' => 'general', // Asume un valor predeterminado, ajusta según tus necesidades
            'privacitat' => 'pública', // Asume un valor predeterminado, ajusta según tus necesidades
            'idioma' => 'Catala', // Asume un valor predeterminado, ajusta según tus necesidades
        ]);

        Xat::create([
            'nom' => 'Xat de prova1',
            'descripcio' => 'Xat de prova1',
            'media_id' => 1,
            'creador_id' => 1,
            'url' => null, // O asigna un valor si corresponde
            'password' => null, // O asigna un valor si corresponde
            'foto' => null, // O asigna un valor si corresponde
            'tipus' => 'general', // Asume un valor predeterminado, ajusta según tus necesidades
            'privacitat' => 'pública', // Asume un valor predeterminado, ajusta según tus necesidades
            'idioma' => 'Catala', // Asume un valor predeterminado, ajusta según tus necesidades

        ]);
    }
}
