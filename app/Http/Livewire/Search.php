<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;

class Search extends Component
{

    public $search;

    public $open = false;

    public function mount()
    {
        $this->user = new User();
    }

    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }

    public function render()
    {

        /* if ($this->search) {

            $users = User::all();

            foreach ($users as $user) {
                if ($user->subscribed('Prueba')) {
                    foreach ($user->products as $product) {
                        $products = $product
                                    ->where('name', 'LIKE' ,'%' . $this->search . '%')
                                    ->where('status', 2)
                                    ->get();
                    }                    
                }
            }

        }else{
            $products = [];
        } */


        if ($this->search) {    
            $products = Product::where('name', 'LIKE' ,'%' . $this->search . '%')
                                ->where('status', 2)
                                ->take(8)
                                ->get();
        } else {
            $products = [];
        }
        
        return view('livewire.search', compact('products'));
    }
}
