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
                                        
                                        alert('Event: ' + info.event.id);
                                        $dispoChoisi = info.event.id;
                                        // change the border color just for fun
                                        info.el.style.borderColor = 'red';
                                        
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

    @section('formulaire')
    <div class="row d-flex justify-content-center align-items-center py-3 px-0 mx-auto">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Créer une rencontre</p>

                                    <form class="mx-1 mx-md-4" method="post" action="{{ route('rencontre', [$personne[0]->id, $dispoChoisi]) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="nom" name="nom" class="form-control" value="{{ $personne[0]->nom }}"/>
                                                <label class="form-label" for="form3Example1c">Votre nom</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $personne[0]->prenom }}" />
                                                <label class="form-label" for="form3Example1c">Votre prenom</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" />
                                                <label class="form-label" for="form3Example3c">Votre adresse courriel</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email" class="form-control" value="{{ $dispoChoisi}}" />
                                                <label class="form-label" for="form3Example3c">Confirmer l'heure choisi</label>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Inscrivez Vous</button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

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