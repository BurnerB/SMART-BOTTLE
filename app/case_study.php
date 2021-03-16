<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class case_study extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
