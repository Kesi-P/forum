<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $fillable = [
        'discussion_id'
    ];
    
    public function owner()
    {
      return $this->belongsTo(User::class, 'user_id'); //find user_id in the class incase the function name is not user
    }

    public function discussion()
    {
      return $this->belongsTo(Discussion::class);
    }
}
