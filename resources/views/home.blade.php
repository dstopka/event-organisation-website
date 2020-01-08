@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="content">
                        <div class="title m-b-md">
                            Welcome to EventHub!
                        </div>
                                        <div class="links">
                                            <a href="{{ route('events.create') }}">Create Event</a>
                                            <a href="{{ route('events.index') }}">Events</a>
                                            <a href="{{ route('calendars.index') }}">My Calendar</a>
                                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
