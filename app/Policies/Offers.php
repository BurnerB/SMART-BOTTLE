<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Offers
{
    use HandlesAuthorization;

    public function update(User $user)
    {
        return $this->getPermission($user,29);
    }

    //custom function
    protected function getPermission($user,$p_id)
    {
        //
        foreach ($user->roles as $role)
        {
            foreach ($role->permissions as $permission)
            {
                if($permission->id == $p_id)
                {
                    return true;
                }

            }
        }

        return false;
    }
}
