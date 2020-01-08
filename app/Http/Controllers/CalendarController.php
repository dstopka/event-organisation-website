<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventDate;
use Doctrine\DBAL\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Redirect,Response;

class CalendarController extends Controller
{

    public function index()
    {
        $dates = EventDate::all();
        $data = DB::select('select * from events A join event_dates B on A.id = B.event_id');
        return view('calendars.index', compact('data'));
    }


    public function create(Request $request)
    {
        $insertArr = [ 'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end
        ];
        $event = Event::insert($insertArr);
        return Response::json($event);
    }


    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);

        return Response::json($event);
    }


    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();

        return Response::json($event);
    }


}
