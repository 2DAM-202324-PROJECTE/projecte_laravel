<?php

namespace App\Livewire\Medias;

use App\Models\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class IndexMedias extends Component
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

    public function delete($id)
    {
        try {
            $media = Media::findOrFail($id);
            $media->delete();
            //filtrem la media esborrada de la col·lecció de medias que
            //passem a la vista
            $this->medias = $this->medias->filter(fn($cat) => $cat->id
                !== $id);
            session()->flash('message', 'Media was successfully deleted.');
        } catch (ModelNotFoundException $th) {
            session()->flash('message-danger', 'Can not find the media to be deleted.');
        }
    }

}
