<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    //
}
