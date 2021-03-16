<?php

namespace App\Policies;

use App\User;
use App\seo;
use Illuminate\Auth\Access\HandlesAuthorization;

class boom
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, seo $seo)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, seo $seo)
    {
        //
    }


    public function delete(User $user, seo $seo)
    {
        //
    }


    public function restore(User $user, seo $seo)
    {
        //
    }


    public function forceDelete(User $user, seo $seo)
    {
        //
    }
}
