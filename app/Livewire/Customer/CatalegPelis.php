<?php

namespace App\Livewire\Customer;


use App\Models\Media;
use Illuminate\Http\Request;
use Livewire\Component;

class CatalegPelis extends Component
{
    public array $pelis = [];

    public $search;
    public $filter = '';
    public $isModalVisible = false;
    public $modalMediaId;
    public $hideAllRowsExceptFirst = true;


    public function pelis(){
        $this->pelis=[];
        $pelis = Media::where('category_id', 1)->get();
        foreach ($pelis as $peli) {
            $this->pelis[] = $peli;
        }
        return $this->pelis;
    }


    public function render(Request $request){
        $this->pelis();

        $searchTerm = $this->search;

        // Realiza la búsqueda en la base de datos sin importar si las películas están visibles en la página
        $pelis = Media::where('category_id', 1);

        // Realiza la búsqueda solo si se proporciona un término de búsqueda
        if ($searchTerm) {
            $pelis = $pelis->where('name', 'like', '%' . $searchTerm . '%');
        }

        $pelis = $pelis->get();

        return view('livewire.customer.cataleg-pelis', [
            'pelis' => $pelis,
            'search' => $searchTerm,
        ]);
    }

    public function showOrHideModal($mediaId)
    {
        $this->isModalVisible = true;
        $this->modalMediaId = $mediaId;
    }

    protected $listeners = ['closeModal'];

    public function closeModal()
    {
        $this->isModalVisible = false;
        $this->hideAllRowsExceptFirst = true;

    }

    // You can call this method whenever you want to reopen the modal
    public function openModal($mediaId)
    {
        $this->showOrHideModal($mediaId);
    }
}



