@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route("events.show",$eventDate->event) }}"><h4>{{ $eventDate->event->title }}</h4></a>
                Start: {{ $eventDate->start }} end: {{ $eventDate->end }}
                <br>
                <strong>Free places: {{ $eventDate->free_places }}</strong>
            </div>
        </div>
    </div>
@endsection
