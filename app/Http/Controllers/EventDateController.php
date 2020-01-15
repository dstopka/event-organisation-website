<?php

namespace App\Http\Controllers;

use App\EventDate;
use App\Ticket;
use Illuminate\Http\Request;

class EventDateController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function show(EventDate $eventDate)
    {
        return view('eventDate.show')->withEventDate($eventDate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function edit(EventDate $eventDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventDate $eventDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventDate $eventDate)
    {
        $eventDate->delete();
        return redirect()->back();
    }

    public function joinOnEvent($id)
    {
        $eventDate = EventDate::find($id);
        if ($eventDate->free_places > 0) {
            $eventDate->free_places--;
            $eventDate->save();

            $ticket = new Ticket();
            $ticket->user_id = \Auth::id();
            $ticket->eventDate_id = $id;
            if($eventDate->event->price==0)
                $ticket->is_paid = true;
            else
                $ticket->is_paid = false;
            $ticket->save();
        }

        return redirect()->back();
    }
}
