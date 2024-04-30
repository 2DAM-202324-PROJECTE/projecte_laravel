<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use App\Models\Message;
use App\Models\Xat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Xatinteractiu extends Component
{
    public $nom, $creador_id, $media_id, $descripcio, $url, $password, $foto, $tipus,
        $missatge, $privacitat, $idioma, $messages;
    public ?Xat $xat;



    public function mount($xat_id = null)
    {
        $this->messages = collect();


         if ($xat_id !== null) {

            try {
                $this->setXat($xat_id);

                $this->loadMisatges();
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

    public function loadMisatges()
    {
        //$this->messages = Message::where('xatinteractiu_id', $this->xat->xatInteractiu->id)->get();
        $xatInteractiu =  $this->xat->xatinteractiu;
        if ($xatInteractiu ){
            $this->messages = $xatInteractiu->messages;

        }

        }

    public function sendMessage()
    {
//        $this->validate([
//            'missatge' => 'required',
//
//        ]);
        Message::create([
            'body' => $this->missatge,
            'sender_id' => auth()->id(),
            'xatinteractiu_id' => $this->xat->xatInteractiu->id,
        ]);


        $this->missatge = '';
        $this->loadMisatges();
    }

    public function render()
    {
        return view('livewire.customer.xatinteractiu');
    }
}
