<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use Livewire\Component;

class MediaModal extends Component
{
    public $media;
    public $isModalVisible = false;

    public function mount($mediaId)
    {
        $this->media = Media::findOrFail($mediaId);
    }

    public function render()
    {
        return view('livewire.customer.media-modal');
    }

    public function playMedia()
    {
        return redirect()->to('/media-player/' . $this->media->id);
        // ('media-player', ['id' => $media->id])
    }

//a index.php
//    public function cridaSave()
//    {
//        return redirect()->to('/medias/save');
//    }

//a Createorupdatemedias.php
//    public function save(){
//        $this->validate();
//        Media::create($this->only([
//            'name',
//            'description',
//            'path',
//            'category_id'
//        ]));
//        return $this->redirectRoute('medias');
//    }

}



