<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function times()
    {
        return $this->hasMany(EventTime::class);
    }

    public function states()
    {
        return $this->hasMany(EventState::class);
    }
}
