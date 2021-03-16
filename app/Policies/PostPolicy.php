<?php

namespace App\Policies;

use App\Model\user\post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class postPolicy
{
    use HandlesAuthorization;

    //override to become publish
    public function viewAny(User $user)
    {
        //
        return $this->getPermission($user,19);
    }

    //override to become feature
    public function view(User $user)
    {
        //
        return $this->getPermission($user,20);
    }

    public function create(User $user)
    {

        return $this->getPermission($user,14);

    }

    public function update(User $user)
    {
        //
        return $this->getPermission($user,16);
    }

    public function delete(User $user)
    {
        //
        return $this->getPermission($user,36);
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
