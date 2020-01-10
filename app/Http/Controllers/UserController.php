<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function events()
    {
        $data = DB::select('select A.id, A.title, A.description,  A.user_id, A.places,  A.price, A.isFree from events A join event_dates B on A.id = B.event_id 
                            where A.user_id = ' . \Auth::id());
        $events = [];
        foreach($data as $event)
        {
            $newEvent = new Event();
            $newEvent->id = $event->id;
            $newEvent->title = $event->title;
            $newEvent->description = $event->description;
            $newEvent->user_id = $event->user_id;
            $newEvent->price = $event->price;
            $newEvent->places = $event->places;
            $newEvent->isFree = false;
            array_push($events, $newEvent);
        }
        return view('user.events.index')->withEvents($events);
    }
}
