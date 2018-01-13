<?php

namespace App\Http\Controllers;

use App\Event;

class ApiController extends Controller
{
    public function all()
    {
        return [
            'lunar' => $this->lunar(),
            'events' => $this->list()
        ];
    }

    public function list()
    {
        $events = Event::with(['times'])->get();
        return $events->each(function ($item) {
            $item->name = is_null($item->status['name']) ? $item->name : $item->status['name'];
        });
        return $events;
    }

    public function lunar()
    {
        $hour = (int)date('G');
        $min = (int)date('i');
        $odd = (bool)($hour % 2);
        $day = false;
        $started = '';
        $elapsed = '';
        
        if ( ! $odd && $min >= 30)
        {
            $day = true;
            $elapsed = $min - 30;
            $started = "$hour:30";
        }
        else if ( ! $odd && $min < 30)
        {
            $elapsed = $min + 15;
            $hour = ($hour + 23) % 24;
            $started = "$hour:45";
        }
        else if ($odd && $min < 45)
        {
            $day = true;
            $elapsed = 60 + $min - 30;
            $hour = ($hour + 23) % 24;
            $started = "$hour:30";
        }
        else if ($odd && $min >= 45)
        {
            $elapsed = $min - 45;
            $started = "$hour:45";
        }
        $duration = ($day ? 75 : 45);
        return [
            'day' => $day,
            'elapsed' => $elapsed,
            'left' => $duration - $elapsed,
            'start' => $started,
            'end' => date('H:i', time() - 60 * $elapsed + $duration * 60),
            'duration' => $duration,
            'percentage' => round($elapsed / $duration * 100, 0)
        ];
    }
}
