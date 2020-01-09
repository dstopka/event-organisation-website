<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventDate;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index')->withEvents($events);
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
            'places' => 'required',
            'price' => 'required',
        ]);
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->user_id = \Auth::id();
        $event->price = $request->price;
        $event->places = $request->places;
        $event->isFree = false;
        $event->save();

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
        return view('events.show')->withEvent($event);
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
        foreach ($event->eventDates as $eventDate)
            $eventDate->delete();

        $event->delete();

        return redirect()->route('events.index');
    }

    public function destroyEventDate(EventDate $eventDate)
    {
        $eventDate->delete();
    }
}
