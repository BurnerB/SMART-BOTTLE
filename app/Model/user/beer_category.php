<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class beer_category extends Model
{
    //
    public function beers()
    {
        return $this->belongsToMany('App\Model\user\beer','category_beers')->where('beers.status',1)->paginate(16);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
