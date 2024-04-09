<?php

namespace App\Livewire;

use Livewire\Component;

class Persones extends Component
{
    public function render()
    {
        return view('livewire.persones', [
            'persones' => Persones::all()
        ]);
    }
}
