@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route("events.show",$eventDate->event) }}"><h4>{{ $eventDate->event->title }}</h4></a>
                Start: {{ $eventDate->start }} end: {{ $eventDate->end }}
                <br>
                <strong>Free places: {{ $eventDate->free_places }}</strong>
                <br>
                @if(auth()->user()->tickets->where('eventDate_id','=',$eventDate->id)->count()==0)
                    @if($eventDate->event->price == 0)
                        <strong><a href="{{ $eventDate->id."/join" }}">Join</a></strong>
                    @else
                        <strong><a href="{{ $eventDate->id."/join" }}">Add to cart</a></strong>
                    @endif
                @else
                    <strong><a href="">Your ticket</a></strong> <!-- TODO -->
                @endif
            </div>
        </div>
    </div>
@endsection
