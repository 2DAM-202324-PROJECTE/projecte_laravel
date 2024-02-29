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

    public function save()
    {
        Category::create(['name' => $this->name]);
        session()->flash('message', 'Categoría creada con éxito.');
        $this->resetForm();
    }

    public function update()
    {
        if (!empty($this->selectedRows)) {
            $id = $this->selectedRows[0];
            return redirect()->route('categories.update', ['id' => $id]);
        } else {
            session()->flash('message-danger', 'Por favor, seleccione una categoría para modificar.');
        }
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
                session()->flash('message-danger', 'Categoría no encontrada.');
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
