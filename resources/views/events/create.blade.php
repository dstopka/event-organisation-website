@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>New event:</h2>

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
                    Title: <input type="text" name="title" value="{{ old("title") }}">
                    <br>
                    Description: <input type="text" name="description" value="{{ old("description") }}">
                    <br>
                    <table>
                        <tr>
                            <th>Date/Time start</th>
                            <th>Date/Time end</th>
                        </tr>
                        <tr>
                            <td><input type="datetime-local" name="start" value="{{ old("start") }}"></td>
                            <td><input type="datetime-local" name="end" value="{{ old("end") }}"></td>
                        </tr>
                    </table>
                    <br>
                    Number of places: <input type="number" name="places" value="{{ old("places") }}">
                    <br>
                    Price: <input type="number" name="price" value="{{ old("price") }}">$
                    <br>
                    Is free? <input type="checkbox" name="isFree" value="{{ old("isFree") }}">
                    <br>
                    <input type="submit" value="Create">
                </form>
            </div>
        </div>
    </div>
@endsection
