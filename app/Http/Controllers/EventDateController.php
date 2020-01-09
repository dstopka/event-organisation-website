<?php

namespace App\Http\Controllers;

use App\EventDate;
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
        //
    }
}
