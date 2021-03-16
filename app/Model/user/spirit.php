<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class spirit extends Model
{
    //
    //
    public function  categories()
    {
        return $this->belongsToMany('App\Model\user\spirit_category','category_spirits');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
