@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Events:</h2>
                <a href="{{ route('events.create') }}">Create new...</a>
            </div>
        </div>
    </div>
@endsection
