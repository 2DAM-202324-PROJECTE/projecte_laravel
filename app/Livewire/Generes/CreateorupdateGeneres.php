<?php

namespace App\Livewire\Generes;

use App\Models\Genere;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateorupdateGeneres extends Component
{
    #[Validate('required|max:50')]
    public $name = '';
    #[Validate('required|max:500')]
    public $description = '';

    public ?Genere $genere;
    public bool $isCreation = true;

    public function create()
    {
        $this->validate();
        Genere::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        return $this->redirectRoute('generes');

    }

    public function cancel()
    {
        return redirect()->to('/generes');
    }


    public function update()
    {
        $this->validate();
        $this->genere->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        return redirect()->route('generes');
    }

    public function setGenere($id)
    {
        $this->genere = Genere::findOrFail($id);
        $this->name = $this->genere->name;
        $this->description = $this->genere->description;
    }

    public function mount($id = null)
    {
        if ($id !== null) {
            $this->isCreation = false;
            try {
                $this->setGenere($id);
            } catch (ModelNotFoundException $e) {
                session()->flash('message-danger', 'C');
            }
        } else {
            $this->isCreation = true;
        }
    }

    protected function resetForm()
    {
        $this->name = '';
        $this->genere = null;
        $this->isCreation = true;
    }

    public function render()
    {
        return view('livewire.generes.createorupdate');
    }
}
