<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class spirit_category extends Model
{
    //
    public function spirits()
    {
        return $this->belongsToMany('App\Model\user\spirit','category_spirits')->where('spirits.status',1)->paginate(16);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
