<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public $selectedRows = [];

    public function mount()
    {
        $this->categories = Category::all();
    }


    public function cridaCreate()
    {
        return redirect()->to('/categories/create');
    }

    public function cridaUpdate($id)
    {
        return redirect()->route('categories.update', ['id' => $id]);
    }

    public function delete()
    {
        foreach ($this->selectedRows as $id) {
            $category = Category::find($id);
            if ($category) {
                $category->delete();
                session()->flash('message', 'Category was successfully deleted.');
            }
        }
        $this->selectedRows = [];
        $this->mount();
    }

    public function selectAll()
    {
        if (count($this->selectedRows) < count($this->categories)) {
            $this->selectedRows = $this->categories->pluck('id')->map(function ($id) {
                return (string) $id;
            })->toArray();
        } else {
            $this->selectedRows = [];
        }
    }


    public function render()
    {
        return view('livewire.categories.index');
    }
}
