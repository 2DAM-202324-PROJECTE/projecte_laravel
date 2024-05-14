<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use Livewire\Component;

class MediaPreview extends Component
{
    public $media;

    public function mount($id)
    {
        $this->media = Media::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.customer.medias-preview');
    }
}
