<?php

namespace App\Livewire\Generes;

use App\Models\Genere;
use Livewire\Component;

class Index extends Component
{
    public $generes;
    public $selectedRows = [];

    public function mount()
    {
        $this->generes = Genere::all();
    }

    public function cridaCreate()
    {
        return redirect()->to('/generes/create');
    }

    public function cridaUpdate($id)
    {
        return redirect()->route('generes.update', ['id' => $id]);
    }

    public function delete()
    {
        foreach ($this->selectedRows as $id) {
            $genere = Genere::find($id);
            if ($genere) {
                $genere->delete();
                session()->flash('message', 'Genere was successfully deleted.');
            }
        }
        $this->selectedRows = [];
        $this->mount();
    }

    public function selectAll()
    {
        if (count($this->selectedRows) < count($this->generes)) {
            $this->selectedRows = $this->generes->pluck('id')->map(function ($id) {
                return (string) $id;
            })->toArray();
        } else {
            $this->selectedRows = [];
        }
    }

    public function render()
    {
        return view('livewire.generes.index');
    }
}
