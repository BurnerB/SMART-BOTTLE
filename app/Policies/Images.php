<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Images
{
    use HandlesAuthorization;

    public function delete(User $user)
    {
        return $this->getPermission($user,37);
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
