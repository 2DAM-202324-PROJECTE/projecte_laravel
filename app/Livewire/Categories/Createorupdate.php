<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Createorupdate extends Component
{
    public $nom = '';

    public function save(){
        Category::create($this->only(['nom']));
        return $this->redirectRoute('categories');
    }
    public function render()
    {
        return view('livewire.categories.createorupdate');
    }
}
