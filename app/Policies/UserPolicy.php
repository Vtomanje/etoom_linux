<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function premium(User $user)
    {
        if ($user->client_status == '2') {
            return true;
        }else{
            return false;
        }
    }
    
    public function clientStatus(User $user)
    {
        if ($user->client_status == 2) {
            return true;
        }else{
            return false;
        }
    }
}
