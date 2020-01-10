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
//        $data = DB::select('select B.id, A.title from events A join event_dates B on A.id = B.event_id
//                            where A.user_id = ' . \Auth::id());

        $data = DB::select('select A.title, A.id, DATE_FORMAT(B.start, "%b %d") as day,
                            DATE_FORMAT(B.start, "%l %i %p") as hour, B.free_places
                            from events A join event_dates B on A.id = B.event_id 
                            where A.user_id = ' . \Auth::id() . ' order by B.start');

        return view('user.events.index')->withEvents($data);
    }
}
