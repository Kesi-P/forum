<?php

namespace App;

class Discussion extends Model
{
    public function sus()
    {
      return $this->belongsTo(User::class,'user_id');
    }

    public function replies()
    {
      return $this->hasMany(Reply::class);
    }
    public function getRouteKeyName()
    {
      return 'slug';
    }
}
