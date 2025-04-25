@extends('layouts.app')

@section('app.name', 'Rencontre+ | Profil de {{ $personne->nom, $personne->prenom}}')

@if(isset($errors) && $errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@if(Auth::check())
@section('content')
<section>
    <div class="container-fluid w-50 pb-5">
        <div class="row align-items-center">
            <div class="col-8">
                <div class="row">
                    <h3 class="nom">{{ $match->nom . ' ' . $match->prenom }}</h3>
                </div>
                <div class="row">
                    <p class="bio-texte"> {{ $match->bio->bio }}</p>
                </div>
            </div>
            <div class="col-4">
                <img src="{{ asset($match->photo) }}" class="img-profil" alt="">
            </div>
        </div>
        <div class="row">
            <h2 class="sous-titre-profil pt-4">Intérêts</h2>
        </div>
        <div class="row">
            <div class="offset-4 col-8">
                <h2 class="texte-profil pt-4">Intérêts</h2>
            </div>
        </div>

    </div>
</section>
<section>
    <div class="container w-50 mx-auto">
        <h1 class="titre-calendrier">Disponibilités</h1>
        <div class="row w-100">
            <div id="calendar">
                @push('scripts')
                <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
                <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
                <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
                <script src='fullcalendar/dist/index.global.js'></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
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
</section>
@endsection
@else
<div class="card">
    <h4 class="h2PageDetail">Vous n'êtes pas autoriser à voir cette page</h4>
</div>
@endif