<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function all()
    {
        $times = Event::with(['states','times'])->get()->toArray();
        foreach ($times as &$time) 
        {
            $timeList = collect($time['times'])->pluck('time_at');
            $time['times'] = $timeList->toArray();
        }
        return $times;
    }
}
