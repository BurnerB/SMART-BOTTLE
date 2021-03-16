<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Categories
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $this->getPermission($user,41);
    }

    public function update(User $user)
    {
        return $this->getPermission($user,43);
    }

    public function delete(User $user)
    {
        return $this->getPermission($user,42);
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
