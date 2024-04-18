<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use Livewire\Component;

class HomePage extends Component
{
    public array $pelis = [];
    public array $documentals = [];

    public $isModalVisible = false;
    public $modalMediaId;

    public function pelis(){
        $this->pelis=[];
        $pelis = Media::where('category_id', 1)->get();
        foreach ($pelis as $peli) {
            $this->pelis[] = $peli;
        }
        return $this->pelis;
    }
    public function documentals(){
        $this->documentals = [];
        $documentals = Media::where('category_id', 2)->get();
        foreach ($documentals as $documental) {
            $this->documentals[] = $documental;
        }
        return $this->documentals;
    }

    public function peliNoves(){
        $this->pelis=[];
        $pelis = Media::where('category_id', 1)
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();
        foreach ($pelis as $peli) {
            $this->pelis[] = $peli;
        }

        return $pelis;
    }

    public function render()
    {
        $this->peliNoves();
        $this->documentals();


        return view('livewire.customer.home-page', [
            'pelis' => $this->pelis,
            'documentals' => $this->documentals,
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
