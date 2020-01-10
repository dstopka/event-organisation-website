@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="response"></div>
                <div id='calendar'></div>
{{--                <h2>Events:</h2>--}}

{{--                <ul>--}}
{{--                    @foreach($events as $event)--}}
{{--                        <li>--}}
{{--                            <strong>{{ $event->title }}</strong>--}}
{{--                            <a href="{{ route('events.show', $event) }}">details</a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

                <a href="{{ route('events.create') }}">Create new...</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>var events = {!! json_encode($data) !!};</script>
@endsection
