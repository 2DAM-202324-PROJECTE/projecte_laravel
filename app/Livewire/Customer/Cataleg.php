<?php

namespace App\Livewire\Customer;


use App\Models\Media;
use Illuminate\Http\Request;
use Livewire\Component;

class Cataleg extends Component
{
    public array $pelis = [];
    public array $documentals = [];
    public $search;
    public $filter = '';
    public $isModalVisible = false;
    public $modalMediaId;


    public function pelis(){
        $pelis = Media::where('category_id', 1)->get();
        foreach ($pelis as $peli) {
            $this->pelis[] = $peli;
        }
        return $this->pelis;
    }

    public function documentals(){
        $documentals = Media::where('category_id', 2)->get();
        foreach ($documentals as $documental) {
            $this->documentals[] = $documental;
        }
        return $this->documentals;
    }

    public function render(Request $request){
        $this->documentals();
        $this->pelis();

        $searchTerm = $this->search;

        // Realiza la búsqueda en la base de datos sin importar si las películas están visibles en la página
        $pelis = Media::where('category_id', 1);
        $documentals = Media::where('category_id', 2);

        // Realiza la búsqueda solo si se proporciona un término de búsqueda
        if ($searchTerm) {
            $pelis = $pelis->where('name', 'like', '%' . $searchTerm . '%');
            $documentals = $documentals->where('name', 'like', '%' . $searchTerm . '%');
        }

        $pelis = $pelis->get();

        return view('livewire.customer.cataleg', [
            'pelis' => $pelis,
            'documentals' => $documentals,
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
    }
}
