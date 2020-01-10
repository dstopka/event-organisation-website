<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
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
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->user_id = \Auth::id();
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
//        return view('events.show')->withEvent($event)->withUser($user)->withImages($images);
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
        //
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
        //
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
        $event->delete();

        return redirect()->route('events.index');
    }
}
