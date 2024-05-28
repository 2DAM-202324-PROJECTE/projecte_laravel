<?php

namespace App\Livewire\Medias;

use App\Models\Category;
use App\Models\Genere;
use App\Models\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Createorupdatemedias extends Component
{
    #[Validate('required|max:100')]
    public $name = '';
    #[Validate('required|max:500')]
    public $description = '';
    #[Validate('required|max:100')]
    public $path = '';
    public $category_id;
    public $genere_id;
    public $image_uri;
    public ?Media $media;
    public bool $isCreation;


    protected $rules = [
        'name' => 'required|max:100',
        'description' => 'required|max:500',
        'path' => 'required|max:100',
        'category_id' => 'required|exists:categories,id',
        'genere_id' => 'required|exists:generes,id',
    ];

    public function save(){
        $this->validate();
        Media::create($this->only([
            'name',
            'description',
            'path',
            'category_id',
            'image_uri',
            'genere_id'
        ]));
        return $this->redirectRoute('medias');
    }

    public function update()
    {
        $this->validate();
        $this->media->update(
            $this->only([
                'name',
                'description',
                'path',
                'category_id',
                'image_uri',
                'genere_id'
            ])
        );
        return $this->redirectRoute('medias');
    }

    public function setMedia($id)
    {
        $media = Media::findOrFail($id);
        $this->media = $media;
        $this->name = $media->name;
        $this->description = $media->description;
        $this->path = $media->path;
        $this->category_id = $media->category_id;
        $this->image_uri = $media->image_uri;
        $this->genere_id = $media->genere_id;
    }

    public function mount($id = null)
    {
        if ($id != null) {
            $this->isCreation = false;
            try {
                $this->setMedia($id);
            } catch (ModelNotFoundException $e) {
                session()->flash('message-danger', 'Can not find the medias to be updated');
            }
        } else {
            $this->isCreation = true;
        }

    }

    public function render()
    {
        $categories = Category::all();
        $generes = Genere::all();
        return view('livewire.medias.createorupdatemedias', [
            'categories' => $categories,
            'generes' => $generes
        ]);
    }

    public function cancel()
    {
        return redirect()->to('/medias');
    }



}
