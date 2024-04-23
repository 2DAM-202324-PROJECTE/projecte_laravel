<?php

namespace App\Livewire\Medias;

use Livewire\Component;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaPlayer extends Component
{
    public $media;
    public $fileExists = false;

    public function mount($id)
    {
        $this->media = Media::find($id);
        // revisar si l'arxiu existeix
        if ($this->media) {
            $this->fileExists = Storage::exists($this->media->path);
        }
    }

    public function render()
    {
        return view('livewire.medias.media-player');
    }
}
