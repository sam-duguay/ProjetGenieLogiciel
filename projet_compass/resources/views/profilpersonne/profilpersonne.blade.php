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
<div class="container-fluid pb-5 mx-2 me-5">
    <div class="row ps-3">
        <div class="col-6 ps-5">
            <div class="row align-items-center ps-5">
                <div class="col-4">
                    <img src="{{ asset($match->photo) }}" class="img-profil" alt="">
                </div>
                <div class="col-8 ps-3">
                    <div class="row">
                        <h3 class="nom">{{ $match->prenom . ' ' . $match->nom }}</h3>
                    </div>
                    <div class="row">
                        <p class="bio-texte"> {{ $match->bio->bio }}</p>
                    </div>
                </div>
            </div>
            <div class="row ml-1 mt-1">
                <div class="col-7 conteneur-interet">
                    <div class="row">
                        <h2 class="pt-4">Intérêts</h2>
                    </div>
                    <div class="row">
                        @foreach ($match->interets as $interet)
                        <div class="overlay-container w-25">
                            <img src="{{ asset($interet->photo) }}" class="img-interet" alt="">
                            <div class="overlay">
                                <div class="overlay-txt">{{$interet->nom}}</h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-5 conteneur-hobbies">
                    <div class="row">
                        <h2 class="pt-4">Hobbies</h2>
                    </div>
                    <div class="row">
                        @foreach ($match->hobbies as $hobby)
                        <div class="overlay-container w-25">
                            <!-- <img src="{{ asset($hobby->photo) }}" class="img-interet" alt=""> -->
                            <div class="overlay">
                                <div class="overlay-txt">{{$hobby->nom}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Some text in the Modal..</p>
            </div>

        </div>
        <div class="col-6 me-1 pe-1">
            <div class="container mx-auto conteneur-calendrier">
                <!-- <h2 class="titre-calendrier text-start">Disponibilités</h2> -->
                <div class="row w-100">
                    <div id="calendar">
                        @push('scripts')
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
                        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
                        <script src='fullcalendar/dist/index.global.js'></script>
                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }

                            document.addEventListener('DOMContentLoaded', function() {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    // dateClick: function() {
                                    //     alert('a date has been clicked');
                                    // },
                                    eventClick: function(info) {
                                        info.jsEvent.preventDefault(); // don't let the browser navigate

                                        modal.style.display = "block";

                                        console.log(info.event.url)
                                        // if (info.event.url) {
                                        //     window.open(info.event.url + '/' + info.event.id);
                                        // }
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
        </div>
    </div>
</div>
</div>
@endsection
@else
<div class="card">
    <h4 class="h2PageDetail">Vous n'êtes pas autoriser à voir cette page</h4>
</div>
@endif