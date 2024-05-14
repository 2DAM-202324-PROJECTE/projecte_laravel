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
        if ($this->media) {
            $this->fileExists = Storage::exists($this->media->path);
        }
    }

    public function render()
    {
        return view('livewire.medias.medias-player');
    }

    protected $listeners = ['playMedia' => 'openPlayer'];

    public function openPlayer($mediaId)
    {
        $this->media = Media::find($mediaId);
        if ($this->media) {
            $this->fileExists = Storage::exists($this->media->path);
        }


    }


}




