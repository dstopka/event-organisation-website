<?php

namespace App\Http\Controllers;

use App\Event;

use App\Image;
use App\EventDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::select('select A.title, B.id, B.event_id, DATE_FORMAT(B.start, "%b %d") as day,
                            DATE_FORMAT(B.start, "%l %i %p") as hour, B.free_places
                             from events A join event_dates B on A.id = B.event_id order by B.start');


        return view('events.index')->withEvents($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg',
            'latitude' => 'required|numeric',
            'longtitude' => 'required|numeric',
            'start' => 'required',
            'end' => 'required',

            'places' => 'required',
            'price' => 'required',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->user_id = \Auth::id();
//        $event->latitude = $_COOKIE['latitude'];
//        $event->longtitude = $_COOKIE['longtitude'];
        $event->latitude = $request->latitude;
        $event->longtitude = $request->longtitude;
        $event->price = $request->price;
        $event->places = $request->places;
        $event->isFree = false;
        $event->save();


        if ($request->has('images'))
        {
            $files = $request->file('images');
            foreach ($files as $file) {

                $name = $file->store('public/images/'.$event->id);
                $image = new Image();
                $image->event_id = $event->id;
                $image->name = 'storage/images/'.$event->id.'/'.basename($name);
                $image->save();

            }
        }

        $eventDate = new EventDate();
        $eventDate->event_id = $event->id;
        $eventDate->start = $request->start;
        $eventDate->end = $request->end;
        $eventDate->free_places = $request->places;
        $eventDate->save();

        return redirect()->route('events.show',$event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $images = $event->images;
        $user = $event->user;
        return view('events.show', compact('event', 'images', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit')->withEvent($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if(isset($request->start) and isset($request->end))
        {
            $eventDate = new EventDate();
            $eventDate->event_id = $event->id;
            $eventDate->start = $request->start;
            $eventDate->end = $request->end;
            $eventDate->free_places = $event->places;
            $eventDate->save();
            return redirect()->route('events.edit', $event);
        }
        else
        {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'places' => 'required',
                'price' => 'required',
            ]);
            $event->title = $request->title;
            $event->description = $request->description;
            $event->price = $request->price;
            $event->places = $request->places;
            $event->isFree = false;
            $event->save();
        }

        return redirect()->route('events.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        DB::table('images')->where('event_id', $event->id)->delete();
        Storage::deleteDirectory('public/images/'.$event->id);

        foreach ($event->eventDates as $eventDate) {
            $eventDate->delete();
//            foreach ($eventDate->tickets as $ticket)
//                $ticket->delete();
        }

        $event->delete();

        return redirect()->route('events.index');
    }

    public function destroyEventDate(EventDate $eventDate)
    {
        $eventDate->delete();
    }
}
