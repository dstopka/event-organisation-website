@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $event->title }}</h2>
                <h4>Added by {{ $event->user->name }} ({{ $event->user->email }})</h4>

                @markdown($event->description)

                <a href="{{ route('events.edit', $event) }}">edit</a>

                <form method="post" action="{{ route('events.destroy', $event) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" value="Delete">
                </form>

                <a href="{{ route('events.index') }}">Return to events list</a>
            </div>
        </div>
    </div>
@endsection
