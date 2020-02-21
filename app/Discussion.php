<?php

namespace App;

use App\Notifications\ReplyMarkedAsBest;

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

    public function getBestReply()
    {
      return Reply::find($this->reply_id);
    }

    public function bestReply()
    {
      return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function markAsBestReply(Reply $reply)
    {
      $this->update([
        'reply_id' => $reply->id
      ]);

      if($reply->owner->id === $this->sus->id)
      {
        return;
      }
      $reply->owner->notify(new ReplyMarkedAsBest($reply->discussion));
    }

    public function scopefilterByChannels($builder)
    {
        if(request()->query('channel')){
          //filter
          $channel = Channel::where('slug', request()->query('channel'))->first();

          if($channel){
            return $builder->where('channel_id', $channel->id);
          }

          return $builder;
        }
        return $builder;
    }
}
