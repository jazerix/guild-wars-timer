<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function all()
    {
        return Event::with(['times'])->get()->toArray();
    }
}
