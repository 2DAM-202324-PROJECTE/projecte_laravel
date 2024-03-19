<?php

namespace App\Livewire\Persona;

use App\Livewire\Users\Users;
use Livewire\Component;

class Persones extends Component
{
    public function render()
    {
        return view('livewire.persona.persones', [
            'persones' => Persones::all()
        ]);
    }

}
