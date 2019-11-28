<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // fields can be filled
    protected $fillable = ['body', 'user_id','movie_id','first_name','last_name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
