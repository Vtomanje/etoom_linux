<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    
    public function published(User $user = null,Product $product)
    {
        if ($user) {
            if($user->hasRole('admin')){
                return true;
            }
        }

        if (User::where('id',$product->user_id)->get()->first()->subscribed('Prueba')) {
            return true;
        }       
        
        else{
            return false;
        }
    }
}
