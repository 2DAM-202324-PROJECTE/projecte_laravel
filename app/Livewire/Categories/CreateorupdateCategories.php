<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class CreateorupdateCategories extends Component
{
    public $name = '';
    public ?Category $category;
    public bool $isCreation;

    public function save(){
        Category::create($this->only(['name']));
        return $this->redirectRoute('categories');
    }
    public function update()
    {
        $this->category->update(
            $this->only(['name'])
        );
        return $this->redirectRoute('categories');
    }
    public function setCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->category = $category;
        $this->name = $category->name;
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
