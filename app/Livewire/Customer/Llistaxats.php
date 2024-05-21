<?php

namespace App\Livewire\Customer;

use App\Models\Xat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Llistaxats extends Component
{
    public array $xats = [];
    public array $xats2 = [];
    public string $nom = '';

    public function xats()
    {
        $this->xats = [];
        $xats = Xat::where('privacitat', 'pública')
            ->orderBy('id', 'desc')
            ->get();

        foreach ($xats as $xat) {
            $this->xats[] = $xat;
        }
        return $this->xats;
    }


    public function xatsCreador(){
        $usuari = Auth::user();
        $this->xats2 = [];
        $xats2 = Xat::where('creador_id', $usuari->id)->get();
        foreach ($xats2 as $xat) {
            $this->xats2[] = $xat;
        }
        return $this->xats2;
    }

    public function render()
    {
        $this->xats();
        $this->xatsCreador();
        $myChatsVisible = false;


        return view('livewire.customer.llistaxats', [
            'myChatsVisible' => $myChatsVisible,
        ]);
    }
}
