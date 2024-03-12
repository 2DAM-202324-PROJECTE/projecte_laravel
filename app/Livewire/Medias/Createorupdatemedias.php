<?php

namespace App\Livewire\Medias;

use App\Models\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Createorupdatemedias extends Component
{
    #[Validate('required|max:100')]
    public $name = '';
    #[Validate('required|max:500')]
    public $description = '';
    #[Validate('required|max:100')]
    public $path = '';
    public ?Media $media;
    public bool $isCreation;

    public function save(){
        $this->validate();
        Media::create($this->only(['name', 'description', 'path']));
        return $this->redirectRoute('medias');
    }

    public function update()
    {
        $this->validate();
        $this->media->update(
            $this->only(['name', 'description', 'path'])
        );
        return $this->redirectRoute('medias');
    }

    public function setMedia($id)
    {
        $media = Media::findOrFail($id);
        $this->media = $media;
        $this->name = $media->name;
        $this->description = $media->description;
        $this->path = $media->path;
    }

    public function mount($id = null)
    {
        if ($id != null) {
            $this->isCreation = false;
            try {
                $this->setMedia($id);
            } catch (ModelNotFoundException $e) {
                session()->flash('message-danger', 'Can not find the media to be updated');
            }
        } else {
            $this->isCreation = true;
        }

    }

    public function render()
    {
        return view('livewire.medias.createorupdatemedias');
    }


}
