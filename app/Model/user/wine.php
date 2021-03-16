<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class wine extends Model
{
    //
    public function  categories()
    {
        return $this->belongsToMany('App\Model\user\wine_category','category_wines');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
