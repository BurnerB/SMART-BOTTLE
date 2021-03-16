<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    public function posts()
    {
        return $this->belongsToMany('App\Model\user\post','category_posts')->join('users','users.id','=','posts.posted_by')->where('posts.status',1)->select('posts.*','users.name as name')->paginate(8);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
