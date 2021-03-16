<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class extra extends Model
{
    //
    public function categories()
    {
        return $this->belongsToMany('App\Model\user\extra_category','category_extras');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
