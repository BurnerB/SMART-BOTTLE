<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
