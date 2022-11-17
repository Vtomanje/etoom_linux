<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UsersType extends Component
{
     /* user products number */
     public $users_registered;
     public $users_with_products;
     public $users_without_products;
     public $premium_users = 0;
     public $users_with_subscription = 0;
 
     public function mount()
     {
        /* users */

        $this->users = User::all();

        /* subscriptions */     

        $this->users_registered = User::role('client')->get()->count();
        $this->users_with_products = User::role('client')->has('products')->get()->count();       
        $this->users_without_products = User::role('client')->doesntHave('products')->get()->count();   
        
        /* premium */        

        foreach ($this->users as $user) {
            if ($user->subscribed('Prueba premium')) {
                $this->premium_users += 1;
            }
        }

        /* subscriptions */

        foreach ($this->users as $user) {
            if ($user->subscribed('Prueba')) {
                $this->users_with_subscription += 1;
            }
        } 
     }

    public function render()
    {
        return view('livewire.admin.users-type')->layout('layouts.admin');
    }
}
