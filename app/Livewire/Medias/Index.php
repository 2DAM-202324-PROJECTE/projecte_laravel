<?php

namespace App\Livewire\Medias;

use App\Models\Media;
use Livewire\Component;

class Index extends Component
{
    public $medias;
    public function mount()
    {
        $this->medias = Media::all();
    }
    public function render()
    {
        return view('livewire.medias.index');
    }
}
