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

    public function create()
    {
        Category::create($this->only(['name']));
        return $this->redirectRoute('categories');

    }


    public function update()
    {
        $this->category->update(['name' => $this->name]);
        return redirect()->route('categories');
    }

    public function setCategory($id)
    {
        $this->category = Category::findOrFail($id);
        $this->name = $this->category->name;
    }

    public function mount($id = null)
    {
        if ($id !== null) {
            $this->isCreation = false;
            try {
                $this->setCategory($id);
            } catch (ModelNotFoundException $e) {
                session()->flash('message-danger', 'C');
            }
        } else {
            $this->isCreation = true;
        }
    }

    protected function resetForm()
    {
        $this->name = '';
        $this->category = null;
        $this->isCreation = true;
    }

    public function render()
    {
        return view('livewire.categories.createorupdate');
    }
}
