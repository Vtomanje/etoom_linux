<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

use Illuminate\Support\Str;

use Livewire\WithFileUploads;

class CreateCategory extends Component
{

    use WithFileUploads;

    public $categories, $category, $rand;

    protected $listeners = ['delete'];

    public $createForm = [        
        'name' => null,
        'slug' => null,
        'image' => null,      
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'slug' => null,
        'image' => null,      
    ];

    public $editImage;

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required|unique:categories,slug',
        'createForm.image' => 'required|image|max:1024',      
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.slug' => 'slug',
        'createForm.image' => 'imagen',
        'editForm.name' => 'nombre',
        'editForm.slug' => 'slug',
        'editImage' => 'imagen',
    ];

    public function mount(){
        $this->getCategories();
        $this->rand = rand();
    }

    public function updatedCreateFormName($value){
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedEditFormName($value){
        $this->editForm['slug'] = Str::slug($value);
    }  

    public function getCategories(){
        $this->categories = Category::all();
    }

    public function save(){
        $this->validate();

        $image = $this->createForm['image']->store('categories');

        $category = Category::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
           
            'image' => $image
        ]);      

        $this->rand = rand();
        $this->reset('createForm');

        $this->getCategories();
        $this->emit('saved');
    }

    public function edit(Category $category){

        $this->reset(['editImage']);
        $this->resetValidation();

        $this->category = $category;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
       
        $this->editForm['image'] = ($category->image);      
    }

    public function update(){

        $rules = [
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:categories,slug,' . $this->category->id,            
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('categories');
        }

        $this->category->update($this->editForm);

        $this->reset(['editForm', 'editImage']);

        $this->getCategories();
    }

    public function delete(Category $category){
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}