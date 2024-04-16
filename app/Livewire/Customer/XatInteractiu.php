<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use App\Models\Xat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class XatInteractiu extends Component
{
    public $nom, $creador_id, $media_id, $descripcio, $url, $password, $foto, $tipus, $privacitat, $idioma;
    public ?Xat $xat;
    public $xatsRelacionats;
    public $xatsCount = 0;
    public $chat;


    public function mount($id = null, $media_id = null)
    {

        $this->xatsRelacionats = collect();

        if ($media_id !== null) {
            $this->media_id = $media_id;
            $this->loadXatsRelacionados();
        } elseif ($id !== null) {
            try {
                $this->setXat($id);
            } catch (ModelNotFoundException $e) {
                session()->flash('message-danger', 'Xat no encontrado.');
            }
        }
    }

    public function loadXatsRelacionados()
    {
        $media = Media::with('xats')->find($this->media_id);
        if ($media) {
            $this->xatsRelacionats = $media->xats;
            $this->xatsCount = $media->xats->count();
        } else {
            $this->xatsRelacionats = collect();
            $this->xatsCount = 0;
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
        return view('livewire.customer.xatinteractiu', [
            'chat' => $this->chat
        ]);
    }
}
