<?php

namespace App\Livewire\Medias;

use App\Models\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class IndexMedias extends Component
{
    public $medias;

    public $selectedRows = [];

    public function mount()
    {
        $this->medias = Media::all();
    }

    public function cridaSave()
    {
        return redirect()->to('/medias/create');
    }

    public function cridaUpdate($id)
    {
        return redirect()->route('medias.update', ['id' => $id]);
    }


    public function render()
    {
        return view('livewire.medias.index');
    }

    public function delete()
    {
        foreach ($this->selectedRows as $id) {
            $media = Media::find($id);
            if ($media) {
                $media->delete();
                session()->flash('message', 'Media was successfully deleted.');
            }
        }
        $this->selectedRows = [];
        $this->mount();
    }

    public function selectAll()
    {
        $this->selectedRows = Media::pluck('id')->map(function ($id) {
            return (string) $id;
        })->toArray();
    }

}
