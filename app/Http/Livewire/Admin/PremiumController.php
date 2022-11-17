<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class PremiumController extends Component
{
    public $product_id = '';

    protected $rules = [
        'product_id' => 'required',      
    ];

    public function render()
    {
        $products = Product::where('user_id',auth()->user()->id)->get();

        return view('livewire.admin.premium-controller',compact('products'))->layout('layouts.admin');
    }
}
