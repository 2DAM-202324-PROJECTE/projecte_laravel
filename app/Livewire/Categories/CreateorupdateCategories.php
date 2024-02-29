<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class CreateorupdateCategories extends Component
{
    public $name = '';
    public $description = '';

    public ?Category $category;
    public bool $isCreation = true;

    public function create()
    {
        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        return $this->redirectRoute('categories');

    }

    public function cancel()
    {
        return redirect()->to('/categories');
    }


    public function update()
    {
        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
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
