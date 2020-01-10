@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>New book:</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    Title: <input type="text" name="title" value="{{ old("title") }}">
                    <br>
                    Description: <input type="text" name="description" value="{{ old("description") }}">
                    <br>
                    Images: <input type="file" name="images[]" multiple="multiple"/>
                    <br>
                    <input type="submit" value="Create">
                </form>
            </div>
        </div>
    </div>
@endsection
