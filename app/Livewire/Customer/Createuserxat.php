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
    public ?int $mediaId = null; // Add mediaId property

    protected $rules = [
        'nom' => 'required|string|max:255',
        'descripcio' => 'required|string',
        'idioma' => 'required|string'
    ];

    public function create()
    {
        $xatInteractiuCreat = Xatinteractiu::create();

        $this->validate();
        $randomUrl = uniqid();

        $this->xat =  Xat::create([
            'creador_id' => auth()->id(),
            'xatinteractiu_id' => $xatInteractiuCreat->id,
            'nom' => $this->nom,
            'descripcio' => $this->descripcio,
            'idioma' => $this->idioma,
            'url' => $randomUrl,
            'media_id' => $this->mediaId // Use the mediaId property
        ]);

        session()->flash('message', 'Xat creat amb èxit.');
        return $this->redirectRoute('customer.xatmedia', ['id' => $this->xat->id]);
    }

    public function cancel()
    {
        return redirect()->to('/customer');
    }

    public function mount($id = null)
    {
        $this->mediaId = $id; // Set the mediaId property
        $nomUsuari = auth()->user()->name;
        if ($id !== null) {
            $this->isCreation = false;
            try {
                $this->setXat($id);
                $num = Xat::where('creador_id', auth()->id())->count();
                $num++;
                $this->nom = "Sala de $nomUsuari $num";
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
        $this->mediaId = $this->xat->media_id; // Ensure mediaId is set
    }

    public function resetForm()
    {
        $this->nom = '';
        $this->descripcio = '';
        $this->url = '';
        $this->idioma = '';
        $this->xat = null;
        $this->isCreation = true;
        $this->mediaId = null; // Reset mediaId
    }

    public function render()
    {
        return view('livewire.customer.createuserxat');
    }
}
