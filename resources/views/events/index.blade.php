@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header"><h2>Events:</h2></div>
                @foreach($events as $event)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-center"><h4>{{$event->day}}</h4>{{$event->hour}}</div>
                                <div class="col-md-6"><h5> <strong> <a href="{{ route('event_date.show', $event->id) }}">{{ $event->title }}</a></strong> </h5></div>
                                <div class="col-md-3">
                                    @if($event->free_places != 0)
                                        <div class="btn btn-details"><a href="{{ route('event_date.show', $event->id) }}">Details</a> </div>
                                    @else
                                        <div class="btn btn-sold-out"><a>Sold Out</a> </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

