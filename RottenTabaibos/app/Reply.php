<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = ['user_id', 'first_name', 'last_name', 'post_id','reply', 'likes', 'dislikes','reply_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
