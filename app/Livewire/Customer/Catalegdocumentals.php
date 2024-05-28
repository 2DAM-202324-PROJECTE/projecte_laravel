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
    public $selectedGenere = null;



    public function loadDocumentals()
    {
        $query = Media::where('category_id', 2);

        if ($this->selectedGenere) {
            $genere = Genere::where('name', $this->selectedGenere)->first();
            if ($genere) {
                $query = $query->where('genere_id', $genere->id);
            }
        }

        if ($this->search) {
            $query = $query->where('name', 'like', '%' . $this->search . '%');
        }

        $this->documentals = $query->get()->toArray();
    }

    public function filterByGenere($genereName)
    {
        $this->selectedGenere = $genereName === 'Tots' ? null : $genereName;
        $this->loadDocumentals();
    }

    public function mount()
    {
        $this->loadDocumentals();
    }

    public function updatedSearch()
    {
        $this->loadDocumentals();
    }


    public function render(Request $request)
    {
        $generes = Genere::all();

        return view('livewire.customer.catalegdocumentals', [
            'documentals' => $this->documentals,
            'search' => $this->search,
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
