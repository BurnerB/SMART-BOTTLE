<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class wine_category extends Model
{
    //
    public function wines()
    {
        return $this->belongsToMany('App\Model\user\wine','category_wines')->where('wines.status',1)->paginate(16);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
