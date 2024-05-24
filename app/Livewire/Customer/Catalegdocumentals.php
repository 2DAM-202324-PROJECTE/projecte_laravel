<?php

namespace App\Livewire\Customer;


use App\Models\Genere;
use App\Models\Media;
use Illuminate\Http\Request;
use Livewire\Component;

class Catalegdocumentals extends Component
{
    public array $documentals = [];
    public $search;
    public $filter = '';
    public $isModalVisible = false;
    public $modalMediaId;



    public function documentals(){
        $this->documentals = [];
        $documentals = Media::where('category_id', 2)->get();
        foreach ($documentals as $documental) {
            $this->documentals[] = $documental;
        }
        return $this->documentals;
    }

    public function render(Request $request){
        $generes = Genere::all();
        $this->documentals();

        $searchTerm = $this->search;

        $documentals = Media::where('category_id', 2);

        // Realiza la búsqueda solo si se proporciona un término de búsqueda
        if ($searchTerm) {
            $documentals = $documentals->where('name', 'like', '%' . $searchTerm . '%');
        }


        return view('livewire.customer.catalegdocumentals', [
            'documentals' => $documentals,
            'search' => $searchTerm,
            'generes' => $generes,
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
