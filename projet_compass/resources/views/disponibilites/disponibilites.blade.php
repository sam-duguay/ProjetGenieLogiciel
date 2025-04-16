@extends('layouts.app')

@section('app.name', 'Rencontre+ | Organiser une rencontre')

<div class="div centerDiv">
    <div id="calendar">
        <!-- @if(count($disponibilites))
            @foreach ($disponibilites as $disponibilite) 
                <p>{{ $disponibilite->date }}</p>
            @endforeach
        @endif -->
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
            @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
            <script> 
                document.addEventListener('DOMContentLoaded', function () {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        slotMinTime: '8:00:00',
                        slotMaxTime: '19:00:00',
                        events: @json($disponibilites),
                    });
                    calendar.render();
                });
            </script>
        @endpush
    </div>
</div>