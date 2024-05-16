<?php

namespace App\Livewire\Customer;

use App\Models\Media;
use App\Models\Xat;
use Livewire\Component;

class Homepage extends Component
{
    public array $pelis = [];
    public array $documentals = [];
    public array $xats = [];

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
        $documentals = Media::where('category_id', 2)
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();
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

    public function xats()
    {
        $this->xats = [];
        $xats = Xat::orderBy('id', 'desc')->get();
        foreach ($xats as $xat) {
            $this->xats[] = $xat;
        }
        return $this->xats;
    }

    public function render()
    {
        $this->peliNoves();
        $this->documentals();
        $this->xats();


        return view('livewire.customer.homepage', [
            'pelis' => $this->pelis,
            'documentals' => $this->documentals,
            'xats' => $this->xats,
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
