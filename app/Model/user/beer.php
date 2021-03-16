<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class beer extends Model
{
    //
    public function categories()
    {
        return $this->belongsToMany('App\Model\user\beer_category','category_beers');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
