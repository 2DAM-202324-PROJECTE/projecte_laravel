<?php

namespace Database\Seeders;

use App\Models\Xat;
use App\Models\Xatinteractiu;
use Illuminate\Database\Seeder;

class XatSeeder extends Seeder
{
    public function run(): void
    {

        for ($i = 1; $i <= 15; $i++) {
            Xat::create([
                'nom' => "Xat de prova $i",
                'descripcio' => "Descripcio jeje $i.",
                'media_id' => 1,
                'creador_id' => 1,
                'url' => null,
                'password' => null,
                'foto' => null,
                'tipus' => 'general',
                'privacitat' => 'pública',
                'idioma' => 'Catala',
                'xatinteractiu_id' => Xatinteractiu::create([])->id,
            ]);
        }

    }

}
