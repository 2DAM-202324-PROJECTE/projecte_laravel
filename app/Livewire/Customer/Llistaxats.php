<?php

namespace App\Livewire\Customer;

use App\Models\Xat;
use Livewire\Component;

class Llistaxats extends Component
{
    public array $xats = [];

    public function xats()
    {
        $this->xats = [];
        $xats = Xat::where('privacitat', 'pública')->get();
        foreach ($xats as $xat) {
            $this->xats[] = $xat;
        }
        return $this->xats;
    }

    public function render()
    {
        $this->xats();
        return view('livewire.customer.llistaxats');
    }
}
