@extends('layouts.app')

@section('app.name', 'Rencontre+ | Organiser une rencontre')

@if(isset($errors) && $errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@if(Auth::check())
    @section('calendrier')
        <div class="container w-75 mx-auto">
            <div class="row w-100">
                <div id="calendar">
                    @push('scripts')
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
                        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
                        <script src='fullcalendar/dist/index.global.js'></script>
                        <script> 
                            document.addEventListener('DOMContentLoaded', function () {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    // dateClick: function() {
                                    //     alert('a date has been clicked');
                                    // },
                                    eventClick: function(info) {
                                        info.jsEvent.preventDefault(); // don't let the browser navigate
                                        console.log(info.event.url)
                                        if (info.event.url) {
                                            window.open(info.event.url + '/' + info.event.id);
                                        }
                                        // alert('Event: ' + info.event.startdate + '\n\nVoulez vous organiser une rencontre à cette date?');
                                        // // change the border color just for fun
                                        // info.el.style.borderColor = 'red';
                                        
                                    },
                                    initialView: 'timeGridWeek',
                                    slotMinTime: '8:00:00',
                                    slotMaxTime: '21:00:00',
                                    events: @json($events),
                                    editable: true
                                });
                                calendar.render();
                                calendar.setOption('height', "auto");
                                calendar.editable = true
                            });
                        </script>
                    @endpush
                </div>
            </div>
            
        </div>
    @endsection
@else
    <div class="card">
        <h4 class="h2PageDetail">Vous n'êtes pas autoriser à voir cette page</h4>
    </div>
@endif