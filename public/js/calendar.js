$(document).ready(function () {

    console.log(events);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    console.log(events);

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: events,
        displayEventTime: true,
        aspectRatio: 1.35,
        editable: true,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        eventClick: function (event) {
            window.location = '/events/' + event['event_id'];
        }

    });
});
