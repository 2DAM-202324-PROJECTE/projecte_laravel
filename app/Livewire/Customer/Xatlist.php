<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use Livewire\Component;

class Xatlist extends Component
{
    public $xatsRelacionats;
    public $xatsCount = 0;

    public function render()
    {

        return view('livewire.customer.xatlist');
    }


    public function loadXatsRelacionados()
    {
        $media = Media::with('xats')->find($this->media_id);
        if ($media) {
            $this->xatsRelacionats = $media->xats;
            $this->xatsCount = $media->xats->count();
        } else {
            $this->xatsRelacionats = collect();
            $this->xatsCount = 0;
        }
    }

    public function mount($media_id = null)
    {
        $this->xatsRelacionats = collect();

        if ($media_id !== null) {
            $this->media_id = $media_id;
            $this->loadXatsRelacionados();
        }
    }
}
