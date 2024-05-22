<?php

namespace App\Livewire\Xats;

use App\Models\Media;
use App\Models\User;
use App\Models\Xat;
use App\Models\Xatinteractiu;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;


class Createorupdatexats extends Component
{

    public $nom, $creador_id, $media_id, $descripcio, $url, $password, $foto, $privacitat, $idioma;
    public $isCreation = true;
    public ?Xat $xat;


    protected $rules = [
        'nom' => 'required|string|max:255',
        'descripcio' => 'required|string',
        'creador_id' => 'required|exists:users,id',
        'url' => 'url',
        //'medias' => 'required|exists:medias,id', // Canmbiem de medias a media_id
        'media_id' => 'required|exists:medias,id',

    ];

//    public function save()
//    {
//        $this->validate();
//
//        if ($this->isCreation) {
//            Xat::create($this->getModelData());
//        } else {
//            $this->xat->update($this->getModelData());
//        }
//
//        return redirect()->route('xats');
//    }

    public function create()
    {
        $xatInteractiuCreat = Xatinteractiu::create([


        ]);

        //ddd($xatInteractiuCreat);
        //ddd($xatInteractiuCreat->id);




      Xat::create([

            'nom' => $this->nom,
            'descripcio' => $this->descripcio,
            'creador_id' => $this->creador_id,
            'media_id' => $this->media_id, // Incluye media_id en la creación
            'url' => $this->url, // Asegúrate de que 'url' es una propiedad pública en tu componente
            'password' => $this->password, // Asegúrate de manejar esto con cuidado por razones de seguridad
            'foto' => $this->foto,
            'privacitat' => $this->privacitat, // Asegúrate de que 'privacitat' es una propiedad pública en tu componente
            'idioma' => $this->idioma, // Asegúrate de que 'idioma' es una propiedad pública en tu componente
            'xatinteractiu_id' => $xatInteractiuCreat->id, // Asegúrate de que 'xatinteractiu_id' es una propiedad pública en tu componente
        ]);

      Media::all();

        session()->flash('message', 'Xat cread amb exit.');
        return $this->redirectRoute('xats');
    }


    public function cancel()
    {
        return redirect()->to('/xats');
    }


    public function update()
    {
        $this->validate();

        if ($this->xat) {
            $this->xat->update([
                'nom' => $this->nom,
                'descripcio' => $this->descripcio,
                'creador_id' => $this->creador_id,
                'media_id' => $this->media_id, // Asegúrate de actualizar media_id
                'url' => $this->url,
                'password' => $this->password,
                'foto' => $this->foto,
                'privacitat' => $this->privacitat,
                'idioma' => $this->idioma,
            ]);

            session()->flash('message', 'Xat actualizado con éxito.');
        }

        return $this->redirectRoute('xats');
    }


    public function setCategory($id)
    {
        $this->xat = Xat::findOrFail($id);
        $this->nom = $this->xat->nom;
        $this->descripcio = $this->xat->descripcio;
        $this->foto = $this->xat->foto;
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
        $this->creador_id = $this->xat->creador_id;
        $this->media_id = $this->xat->media_id;
        $this->descripcio = $this->xat->descripcio;
        $this->url = $this->xat->url;
        $this->password = $this->xat->password;
        $this->foto = $this->xat->foto;
        $this->privacitat = $this->xat->privacitat;
        $this->idioma = $this->xat->idioma;
    }

    protected function getModelData()
    {
        return [
            'nom' => $this->nom,
            'descripcio' => $this->descripcio,
            'url' => $this->url,
            'password' => $this->password,
            'foto' => $this->foto,
            'privacitat' => $this->privacitat,
            'idioma' => $this->idioma,
        ];
    }

    public function resetForm()
    {
        $this->nom= '';
        $this->descripcio = '';
        $this->foto = '';
        $this->xat = null;

        $this->isCreation = true;
    }



    public function render()
    {
       $users = User::all();
        $medias = Media::all();
        // Pasamos las variables $users y $medias a la vista.
        return view('livewire.xats.createorupdatexats', [
            'users' => $users,
            'medias' => $medias, // Asegúrate de pasar la variable $medias a la vista.
        ]);
    }
}

