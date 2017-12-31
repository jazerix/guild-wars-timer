<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $appends = ['minutes_til_next'];

    public function times()
    {
        return $this->hasMany(EventTime::class);
    }

    public function states()
    {
        return $this->hasMany(EventState::class);
    }

    public function getMinutesTilNextAttribute()
    {
        $time = $this->timeTilNext();
        return $time['hour'] * 60 + $time['minute'];
    }

    private function timeTilNext()
    {
        $hour = (int)date('H');
        $minute = (int)date('i');
        $next = $this->findEvent($hour, $minute);
        $hour = $next['hour'] - $hour;
        $minute = $next['minute'] - $minute;
        if ($minute < 0) {
            $minute += 60;
            $hour--;
        }
        if ($hour < 0) {
            $hour += 23;
        }
        return ['hour' => $hour, 'minute' => $minute];
    }

    private function findEvent($hour, $minute)
    {
        $event = null;
        foreach($this->times as $time)
        {
            if ( ! is_null($event))
                break;
            $eventTime = explode(':', $time->time_at);
            $tHour = (int)$eventTime[0];
            $tMinute = (int)$eventTime[1];

            if ($hour < $tHour || ($hour == $tHour && $minute < $tMinute))
            {
                $event = [
                    'hour' => $tHour,
                    'minute' => $tMinute
                ];
                break;
            }
        }

        if (is_null($event)) {
            $eventTime = explode(':', $time->time_at);
            $tHour = (int)$eventTime[0];
            $tMinute = (int)$eventTime[1];
            return [
                'hour' => $tHour,
                'minute' => $tMinute
            ];
        }
        return $event;
    }

}
