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
    }

    public function joinChatroom()
    {
        return redirect()->to('/join-chat/' . $this->media->id);
    }

    public function hostChatroom()
    {
        return redirect()->to('/createuserxat/' . $this->media->id);
    }

}



