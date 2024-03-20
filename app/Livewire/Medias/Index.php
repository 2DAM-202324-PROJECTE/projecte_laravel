<?php

namespace App\Livewire\Medias;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selectedRows = [];

    public function cridaSave()
    {
        return redirect()->to('/medias/save');
    }

    public function cridaUpdate($id)
    {
        return redirect()->route('medias.update', ['id' => $id]);
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
        $this->render();
    }

    public function render()
    {
        $medias = Media::paginate(10);
        return view('livewire.medias.index', ['medias' => $medias]);
    }

    public function selectAll()
    {
        $allMediaIds = Media::pluck('id')->toArray();

        if (count($this->selectedRows) < count($allMediaIds)) {
            $this->selectedRows = $allMediaIds;
        } else {
            $this->selectedRows = [];
        }
    }

}
