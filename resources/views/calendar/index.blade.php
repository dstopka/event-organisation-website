@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        <div class="response"></div>
        <div id='calendar'></div>
    </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>var events = {!! json_encode($data) !!};</script>
<script src="{{ asset('js/calendar.js') }} "></script>
@endsection

