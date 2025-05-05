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
<div class="container-fluid pb-5 me-5">
    <div class="offset-2 col-8 ps-5">
        <div class="row ps-3">
            <div class="row align-items-center ps-5">
                <div class="col-3">
                    <img src="{{ asset($match->photo) }}" class="img-profil" alt="">
                </div>
                <div class="col-8">
                    <div class="row">
                        <h3 class="nom">{{ $match->prenom . ' ' . $match->nom }}</h3>
                    </div>
                    <div class="row">
                        <p class="bio-texte">
                            @if($match->bio)
                            {{ $match->bio->bio }}
                            @else
                            Salut !je suis ici pour élargir mon cercle d’amis et partager de bons moments avec des personnes sympas et bienveillantes. 😊
                            Je suis quelqu’un de sociable, curieux(se) et toujours partant(e) pour une balade, un resto, un ciné ou un simple café en bonne compagnie. J’adore [tes centres d’intérêt – ex : les jeux de société, la randonnée, les séries, les brunchs entre amis], et je suis toujours ouvert(e) à découvrir de nouvelles activités.
                            Si tu cherches à créer des liens sans prise de tête, papoter autour d’un verre ou organiser des sorties à plusieurs, n’hésite pas à me contacter. À très vite j’espère !
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ml-1 my-5">
            <div class="col-7 conteneur-interet">
                <div class="row">
                    <h2 class="pt-4">Intérêts</h2>
                </div>
<<<<<<< Updated upstream
                <div class="row">
=======
                <div class="row justify-content-center my-3">
>>>>>>> Stashed changes
                    @foreach ($match->interets as $interet)
                    <div class="overlay-container w-auto mx-1">
                        <img src="{{ asset($interet->photo) }}" class="img-interet" alt="">
                        <div class="overlay">
                            <div class="overlay-txt pt-2">{{$interet->nom}}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-5 conteneur-hobbies">
                <div class="row">
                    <h2 class="pt-4">Hobbies</h2>
                </div>
<<<<<<< Updated upstream
                <div class="row">
=======
                <div class="row justify-content-center my-3">
>>>>>>> Stashed changes
                    @foreach ($match->hobbies as $hobby)
                    <div class="overlay-container  w-auto mx-1">
                        <img src="{{ asset($hobby->photo) }}" class="img-interet" alt="">
                        <div class="overlay">
                            <div class="overlay-txt pt-2">{{$hobby->nom}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <a href="{{ route('messages') }}"></a>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content align-items-center">
                <div class="row w-100 justify-content-end">
                    <span class="close float-right">&times;</span>
                </div>
                <h2 class="txt-modal">Prevoir une Rencontre: </h2>
                <div class="row align-items-start">
                    <h4 id="dateDebut"></h4>
                </div>
                <div class="row">
                    <h4 id="heureDebut"></h4>
                </div>
                <div class="row">
                    <h4 id="heureFin"></h4>
                </div>
                <div class="row">
                    <form id="formulaire" action="{{ route('messages.create.personne', $match) }}" method="get" class="pt-3">
                        @csrf
                        <button type="submit" class="btn">Prévoir une rencontre</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row ml-1 mt-1">
        <div class="container mx-auto conteneur-calendrier">
            <div class="offset-2 col-8 py-5">
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
                                eventClick: function(info) {
                                    info.jsEvent.preventDefault(); // don't let the browser navigate

                                    modal.style.display = "block";

                                    var dateDebut = document.getElementById('dateDebut');
                                    dateDebut.innerHTML = "Date: " + (info.event.start).toLocaleDateString();

                                    var heureDebut = document.getElementById('heureDebut');
                                    heureDebut.innerHTML = "Heure de début: " + (info.event.start).toLocaleTimeString();

                                    var heureFin = document.getElementById('heureFin');
                                    heureFin.innerHTML = "Heure de fin: " + (info.event.end).toLocaleTimeString();

                                    var formulaire = document.getElementById('formulaire_rencontre');

                                    console.log(formulaire);
                                    formUrl = "{{ route('rencontre',  ':id') }}";
                                    formUrl = formUrl.replace(':id', info.event.id);
                                    formulaire.action = formUrl;
                                },
                                initialView: 'dayGridMonth',
                                slotMinTime: '8:00:00',
                                slotMaxTime: '22:00:00',
                                events: @json($events),
                                editable: true
                            });
                            calendar.render();
                            calendar.setOption('height', '40%');
                            calendar.editable = true
                        });
                    </script>
                    @endpush
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
</div>