<?php

namespace App\Livewire\Customer;

use App\Models\Xat;
use App\Models\Xatinteractiu;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Createuserxat extends Component
{
    public $nom, $descripcio, $url, $idioma;
    public $isCreation = true;
    public ?Xat $xat = null;

    protected $rules = [
        'nom' => 'required|string|max:255',
        'descripcio' => 'required|string',
        'idioma' => 'required|string'
    ];

    public function create()
    {
        $xatInteractiuCreat = Xatinteractiu::create();


        $this->validate();


        $this->xat =  Xat::create([
            'creador_id' => auth()->id(), // 'creador_id' => auth()->id(),
            'xatinteractiu_id' => $xatInteractiuCreat->id, // 'xatinteractiu_id' => $xatInteractiuCreat->id,
            'nom' => $this->nom,
            'descripcio' => $this->descripcio,
            'idioma' => $this->idioma
        ]);

        session()->flash('message', 'Xat cread amb exit.');
        return $this->redirectRoute('customer.xatmedia', ['id' => $this->xat->id]);
    }

        public function cancel()
    {
        return redirect()->to('/customer');
    }

    public function mount($id = null)
    {

        if ($id !== null) {
            $this->isCreation = false;
            try {
                $this->setXat($id);
            } catch (ModelNotFoundException $e) {
                session()->flash('message-danger', 'Xat no encontrado.');
            }
        }
    }

    protected function setXat($id)
    {
        $this->xat = Xat::findOrFail($id);
        $this->nom = $this->xat->nom;
        $this->descripcio = $this->xat->descripcio;
        $this->url = $this->xat->url;
        $this->idioma = $this->xat->idioma;
    }

    public function resetForm()
    {
        $this->nom = '';
        $this->descripcio = '';
        $this->url = '';
        $this->idioma = '';
        $this->xat = null;
        $this->isCreation = true;
    }

    public function render()
    {
        return view('livewire.customer.createuserxat');
    }
}
