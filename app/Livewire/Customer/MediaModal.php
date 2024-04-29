<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use Livewire\Component;

class MediaModal extends Component
{
    public $media;
    public $isModalVisible = false;
    public $modalMediaId;


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
        $this->isModalVisible = false;
    }

    public function showOrHideModal($mediaId)
    {
        $this->isModalVisible = true;
        $this->modalMediaId = $mediaId;
    }


    public function playMedia()
    {
        $this->dispatchBrowserEvent('playMediaEvent', ['mediaId' => $this->media->id]);
    }



}



