<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller
{
    public function cart(Request $request)
    {
        if(!isset($request->card_no)) {
            //$tickets = User::find(auth()->id())->tickets->where('is_paid', '=', false);
            $data = DB::select('select A.title, A.price, B.id, DATE_FORMAT(B.start, "%b %d") as day,
                            DATE_FORMAT(B.start, "%l %i %p") as hour, B.free_places
                             from events A 
                             join event_dates B on A.id = B.event_id 
                             join tickets T on B.id = T.eventDate_id 
                             where T.is_paid = false 
                             order by B.start');
            $sum = 0;
            foreach ($data as $i)
                $sum += $i->price;
            return view("ticket.cart")->withTickets($data)->withSum($sum);
        }
        else
        {
            foreach (auth()->user()->tickets as $ticket) {
                $ticket->is_paid = 1;
                $ticket->save();
            }
            return redirect()->route("tickets.index");
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('select A.title, A.price, B.id, DATE_FORMAT(B.start, "%b %d") as day,
                            DATE_FORMAT(B.start, "%l %i %p") as hour, B.free_places, T.id as ticket_id
                             from events A 
                             join event_dates B on A.id = B.event_id 
                             join tickets T on B.id = T.eventDate_id 
                             where T.is_paid = true 
                             order by B.start');
        return view("ticket.index")->withTickets($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $pdf=\PDF::loadView('ticket.ticket', ['ticket'=>$ticket])->setPaper('a6', 'landscape');
        //return $pdf->download();
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
