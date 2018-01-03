<?php

namespace App\Http\Controllers;

use App\Event;

class EventController extends Controller
{
    public function all()
    {
        $events = Event::with(['times'])->get();
        return $events->each(function ($item) {
            $item->name = is_null($item->status['name']) ? $item->name : $item->status['name'];
        });
        return $events;
    }
}
