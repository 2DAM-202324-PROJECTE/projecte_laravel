<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = Category::all();
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        if ($category) {
            $category->delete();
            $this->categories = $this->categories
                ->filter(fn ($cat) => $cat->id !== $id);
            session()->flash('message', 'Category was successfully deleted.');
        } else {
            session()->flash('message-danger', 'Can not find the category to be deleted.');
        }
    }
    public function render()
    {
        return view('livewire.categories.index');
    }
}
