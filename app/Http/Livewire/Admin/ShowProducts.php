<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\User;
use App\Models\Product;


use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowProducts extends Component
{
    use WithPagination;
    
    public $users = [];
    public $users_type = [1,2];

    public $user_type_id = "";
    public $user_id = "";   

    /* states */

    public $states = [];
    public $state_id = '';

    public $temp;

    public function updatedUserTypeId($value)
    {
        $this->users = User::all();

        $this->reset(['user_id']);
    }    

    public function updatedUserId()
    {
        $this->states = Department::all();
    }

    public function deleteFilter()
    {
        $this->reset(['user_type_id','user_id','state_id','states']);
    }

    public function productsDraft($user_id,$state_id)
    {
        if ($user_id && $state_id) {

            $products = Product::where('user_id',$user_id)->where('department_id',$state_id)->get();

            foreach ($products as $product ) {
                $product->status = 1;
                $product->save();
            }        

        }elseif($user_id){

            $products = Product::where('user_id',$user_id)->get();

            foreach ($products as $product ) {
                $product->status = 1;
                $product->save();
            }
        }
    }

    public function productsPublished($user_id,$state_id)
    {
        if ($user_id && $state_id) {

            $products = Product::where('user_id',$user_id)->where('department_id',$state_id)->get();

            foreach ($products as $product ) {
                $product->status = 2;
                $product->save();
            }        

        }elseif($user_id){

            $products = Product::where('user_id',$user_id)->get();

            foreach ($products as $product ) {
                $product->status = 2;
                $product->save();
            }
        }

    }
    
    public function render()
    {
        $productsQuery = Product::query()->whereHas('user',function(Builder $query){
            $query->where('id',$this->user_id);
        });

        if ($this->state_id) {
            $productsQuery =  $productsQuery->whereHas('department',function(Builder $query){
                $query->where('id',$this->state_id);
            });
        }
        
        $products = $productsQuery->paginate(1);

        return view('livewire.admin.show-products',compact('products'))->layout('layouts.admin');
    }
}