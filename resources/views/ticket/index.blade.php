@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header"><h2>Your tickets:</h2></div>
            @foreach($tickets as $ticket)
                <!-- some errors with $ticket->eventDate -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-center"><h4>{{$ticket->day}}</h4>{{$ticket->hour}}</div>
                                <div class="col-md-5"><h5><strong> <a
                                                href="{{ route('event_date.show', $ticket->id) }}">{{ $ticket->title }}</a></strong>
                                    </h5></div>
                                <div class="col-md-4"><h5><strong><a href="{{ route('tickets.show', $ticket->ticket_id) }}" target="_blank">Download ticket</a></strong></h5></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
