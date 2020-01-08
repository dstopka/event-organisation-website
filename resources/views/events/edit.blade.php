@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit event:</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('events.store') }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    Title: <input type="text" name="title" value="{{ $event->title }}">
                    <br>
                    Description: <input type="text" name="description" value="{{ $event->description }}">
                    <br>
                    Number of places: <input type="number" name="places" value="{{ $event->places }}">
                    <br>
                    Price: <input type="number" name="price" value="{{ $event->price }}">$
                    <br>
                    Is free? <input type="checkbox" name="isFree" value="{{ $event->isFree }}">
                    <br>
                    <input type="submit" value="Edit">
                </form>

                <h2>Edit event's dates:</h2>
                <form method="post" action="{{ route('events.update', $event) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <table>
                        <tr>
                            <th>Date/Time start</th>
                            <th>Date/Time end</th>
                        </tr>
                        @foreach($event->eventDates as $eventDate)
                            <tr>
                                <td>{{ $eventDate->start }}</td>
                                <td>{{ $eventDate->end }}</td>
                                <td><a href="{{-- route('events.destroyEventDate',$eventDate) --}}">delete</a> </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><input type="datetime-local" name="start" value="{{ old("start") }}"></td>
                            <td><input type="datetime-local" name="end" value="{{ old("end") }}"></td>
                        </tr>
                    </table>
                    <input type="submit" value="Add date">
                </form>
            </div>
        </div>
    </div>
@endsection
