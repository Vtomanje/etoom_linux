<?php

namespace App\Http\Livewire;

use App\Models\User;

use App\Models\Product;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategories,$user;

    public $view = "grid";

    protected $queryString = ['subcategories'];

    public function mount()
    {
        $this->user = new User();
    }

    public function clear(){
        $this->reset(['subcategories','page']);
    }


    public function updatedSubcategories(){
        $this->resetPage();
    }

 /*    public function updatedBrand(){
        $this->resetPage();
    } */

    public function render()
    {

        /* $products = $this->category->products()
                            ->where('status', 2)->paginate(20); */

        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if ($this->subcategories) {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('slug', $this->subcategories);
            });
        }

       /*  if ($this->brand) {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->brand);
            });
        } */

        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}