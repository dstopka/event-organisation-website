@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header"><h2>Tickets to pay:</h2></div>
            @foreach($tickets as $ticket)
                <!-- some errors with $ticket->eventDate -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-center"><h4>{{$ticket->day}}</h4>{{$ticket->hour}}</div>
                                <div class="col-md-5"><h5><strong> <a
                                                href="{{ route('event_date.show', $ticket->id) }}">{{ $ticket->title }}</a></strong>
                                    </h5></div>
                                <div class="col-md-4"><h5><strong> Price: {{ $ticket->price }}$</strong></h5></div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    <h5>
                                        <strong>Card No:</strong>
                                        <input type="text" name="card_no" value="{{ old("card_no") }}">
                                        <input type="submit" value="Pay">
                                    </h5>
                                </form>
                            </div>
                            <div class="col-md-4"><h5><strong> To pay: {{ $sum }}$</strong></h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
