<?php

namespace App\Livewire\Xats;

use App\Models\Xat;
use Livewire\Component;

class Index extends Component
{
    public $xats;
    public $selectedRows = [];

    public function mount()
    {
        $this->xats = Xat::all();
    }

    public function cridaCreate()
    {
        return redirect()->to('/xats/create');
    }

    public function cridaUpdate($id)
    {
        return redirect()->route('xats.update', ['id' => $id]);
    }

    public function delete()
    {
        foreach ($this->selectedRows as $id) {
            $xats = Xat::find($id);
            if ($xats) {
                $xats->delete();
                session()->flash('message', 'Category was successfully deleted.');
            }
        }
        $this->selectedRows = [];
        $this->mount();
    }

    public function selectAll()
    {
        if (count($this->selectedRows) < count($this->xats)) {
            $this->selectedRows = $this->xats->pluck('id')->map(function ($id) {
                return (string) $id;
            })->toArray();
        } else {
            $this->selectedRows = [];
        }
    }


    public function render()
    {
        return view('livewire.xats.index');
    }
}
