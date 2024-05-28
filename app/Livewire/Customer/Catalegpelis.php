<?php

namespace App\Livewire\Customer;


use App\Models\Genere;
use App\Models\Media;
use Illuminate\Http\Request;
use Livewire\Component;

class Catalegpelis extends Component
{
    public array $pelis = [];

    public $search;
    public $filter = '';
    public $isModalVisible = false;
    public $modalMediaId;
    public $hideAllRowsExceptFirst = true;
    public $selectedGenere = null;

    public function loadPelis()
    {
        $query = Media::where('category_id', 1);

        if ($this->selectedGenere) {
            $genere = Genere::where('name', $this->selectedGenere)->first();
            if ($genere) {
                $query = $query->where('genere_id', $genere->id);
            }
        }

        if ($this->search) {
            $query = $query->where('name', 'like', '%' . $this->search . '%');
        }

        $this->pelis = $query->get()->toArray();
    }

    public function filterByGenere($genereName)
    {
        $this->selectedGenere = $genereName === 'Tots' ? null : $genereName;
        $this->loadPelis();
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

    public function openModal($mediaId)
    {
        $this->showOrHideModal($mediaId);
    }

    public function mount()
    {
        $this->loadPelis();
    }

    public function updatedSearch()
    {
        $this->loadPelis();
    }

    public function render(Request $request)
    {
        $generes = Genere::all();

        return view('livewire.customer.catalegpelis', [
            'pelis' => $this->pelis,
            'search' => $this->search,
            'generes' => $generes,
        ]);
    }
}
