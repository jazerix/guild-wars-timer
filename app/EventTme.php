<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTime extends Model
{
    public $timestamps = false;
    protected $hidden = ['id', 'event_id'];
}
