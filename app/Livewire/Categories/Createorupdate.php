<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Createorupdate extends Component
{
    public $nom = '';
    public ?Category $category;
    public bool $isCreation;

    public function save(){
        Category::create($this->only(['nom']));
        return $this->redirectRoute('categories');
    }
    public function update()
    {
        $this->category->update(
            $this->only(['nom'])
        );
        return $this->redirectRoute('categories');
    }
    public function setCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->category = $category;
        $this->nom = $category->nom;
    }

    public function mount($id = null)
    {
        if($id != null){
            $this->isCreation = false;
            try{
                $this->setCategory($id);
            }catch (ModelNotFoundException $e){
                session()->flash('message-danger', 'Category not found');
            }
        }else{
            $this->isCreation = true;
        }
    }

    public function render()
    {
        return view('livewire.categories.createorupdate');
    }
}
