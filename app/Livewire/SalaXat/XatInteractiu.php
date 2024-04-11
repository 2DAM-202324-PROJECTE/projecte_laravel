<?php

namespace App\Livewire\SalaXat;

use App\Models\Xat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class XatInteractiu extends Component
{
    public $nom, $creador_id, $media_id, $descripcio, $url, $password, $foto, $tipus, $privacitat, $idioma;
    public ?Xat $xat;

    public function mount($id = null)
    {

        if ($id !== null) {
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
        $this->creador_id = $this->xat->creador_id;
        $this->media_id = $this->xat->media_id;
        $this->descripcio = $this->xat->descripcio;
        //$this->url = $this->xat->url;
        //$this->password = $this->xat->password;
        //$this->foto = $this->xat->foto;
        //$this->tipus = $this->xat->tipus;
        //$this->privacitat = $this->xat->privacitat;
        //$this->idioma = $this->xat->idioma;
    }

    public function render()
    {
        return view('livewire.salaxat.xatinteractiu');
    }
}
