<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class extra_category extends Model
{
    //
    public function extras()
    {
        return $this->belongsToMany('App\Model\user\extra','category_extras')->where('extras.status',1)->paginate(16);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
