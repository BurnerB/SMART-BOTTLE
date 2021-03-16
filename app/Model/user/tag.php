<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Model\user\post','post_tags')->join('users','users.id','=','posts.posted_by')->orderBy('created_at','DESC')->where('posts.status',1)->select('posts.*','users.name as name')->paginate(8);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
