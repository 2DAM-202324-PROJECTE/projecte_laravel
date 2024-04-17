<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use Livewire\Component;

class MediaModal extends Component
{
    public $media;

    public function mount($mediaId)
    {
        $this->media = Media::findOrFail($mediaId);
    }

    public function render()
    {
        return view('livewire.customer.media-modal');
    }

    public function closeModal()
    {
        $this->emitUp('closeModal'); // Emit event to parent component
    }



}



