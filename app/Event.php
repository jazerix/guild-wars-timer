<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $appends = ['next', 'status'];

    public function times()
    {
        return $this->hasMany(EventTime::class);
    }

    public function states()
    {
        return $this->hasMany(EventState::class);
    }

    public function getNextAttribute()
    {
        $time = $this->timeTilNext();
        return [
            'hour' => $time['hour'],
            'minute' => $time['minute'],
            'total_minute' => $time['hour'] * 60 + $time['minute'],
            'at' => $time['at']
        ];
    }

    public function getStatusAttribute()
    {   
        $priorToDuration = time() - $this->duration * 60;
        $current = $this->findEvent((int)date('H', $priorToDuration), (int)date('i', $priorToDuration));

        $currentTimeStart = new \DateTime("{$current['hour']}:{$current['minute']}:00");
        $currentTimeStart = $currentTimeStart->getTimestamp();
        $currentTimeEnd = new \DateTime("{$current['hour']}:{$current['minute']}:00");
        $currentTimeEnd->add(new \DateInterval("PT{$this->duration}M"));
        $currentTimeEnd = $currentTimeEnd->getTimestamp();

        $active = false;

        if (time() >= $currentTimeStart && time() <= $currentTimeEnd)
            $active = true;
    
        $status = [
            'active' => false,
            'cooldown' => $active ? floor($currentTimeEnd - time()) : null
        ];
    

        return $status;
    }
    private function timeTilNext()
    {
        $hour = (int)date('H');
        $minute = (int)date('i');
        $next = $this->findEvent($hour, $minute);
        $at = $next;
        $hour = $next['hour'] - $hour;
        $minute = $next['minute'] - $minute;
        if ($minute < 0) {
            $minute += 60;
            $hour--;
        }
        if ($hour < 0) {
            $hour += 24;
        }
        return ['hour' => $hour, 'minute' => $minute, 'at' => $at];
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
            $eventTime = explode(':', $this->times[0]->time_at);
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
