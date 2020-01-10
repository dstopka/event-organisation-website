<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                                        <h2>My Events:</h2>

                                       <ul>
                                                @foreach($events as $event)
                                                        <li>
                                                                <strong>{{ $event->title }}</strong>
                                                               <a href="{{ route('events.show', $event) }}">details</a>
                                                           </li>
                                                                               @endforeach
                                            </ul>

                        <a href="{{ route('events.create') }}">Create new...</a>
                    </div>
            </div>
    </div>
