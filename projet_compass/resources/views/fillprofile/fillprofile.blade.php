@extends('layouts.app')

@section('title', 'Profile')

@if(isset($errors) && $errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Profile : {{ $personne->nom }}</p>
                              @if(isset($personne))  
                                <form class="mx-1 mx-md-4" method="post" action="{{ route('update', $id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="nom" value="{{ $personne->nom }}"/>
                                            <label class="form-label" for="form3Example1c">Votre nom</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="prenom" value="{{ $personne->prenom }}" />
                                            <label class="form-label" for="form3Example1c">Votre Prenom</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <p>Sélectionner votre statut</p>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <select name="statut" id="statut" class="form-select form-select-sm" aria-label=".form-select-sm example" value="{{ $personne->statut }}">
                                                <option value="professeur">professeur</option>
                                                <option value="etudiant">etudiant</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="file" id="photo" class="form-control" name="photo" value="{{ $personne->photo  }}" />
                                            <label class="form-label" for="form3Example3c">Téléchager votre photo</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="number" id="age" class="form-control" name="age" value="{{ $personne->age }}" />
                                            <label class="form-label" for="form3Example3c"> Votre age</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <p>Sélectionner votre sexe</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="sexe" id="sexe" class="form-select custom-select-style" value="{{ $personne->sexe }}">
                                                <option value="femelle">femelle</option>
                                                <option value="male">male</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <p>Sélectionner votre Programme / Discipline</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="discipline_id" id="discipline_id" class="form-select custom-select-style" value="{{ $personne->discipline_id }}">
                                                @foreach ($disciplines as $discipline )
                                                    <option value="{{ $discipline->id}}">
                                                        {{ $discipline->noProgramme." , ". $discipline->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- select parmi existant --}}
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <p>Sélectionner vos hobbies</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="hobbies[]" id="hobbies" class="form-select custom-select-style" multiple>
                                                @foreach ($hobbies as $hobbie)
                                                    <option value="{{ $hobbie->id }}" {{ $personne->hobbies->contains($hobbie->id) }}>{{ $hobbie->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <p>Sélectionner vos intérêts</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="interets[]" id="interets" class="form-select custom-select-style" multiple>
                                                @foreach ($interets as $interet)
                                                    <option value="{{ $interet->id }}">
                                                        {{ $interet->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <p>Selectionner vos langues parlées</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="langues[]" id="langues" class="form-select custom-select-style" multiple>
                                                @foreach ($langues as $langue)
                                                    <option value="{{ $langue->id }}">
                                                        {{ $langue->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <button  class="btn btn-primary btn-lg"  id="new_hobbie" type="button">
                                        plus
                                    </button>
                                    <div class="d-flex flex-row align-items-center mb-4" id="group_hobbie"> --}}
                                        {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
                                        {{-- <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="hobbie_nom" class="form-control" name="hobbie_nom[]" placeholder="nom hobbie"/>
                                            <input type="text" id="hobbie_description" class="form-control" name="hobbie_description[]" placeholder="description hobbie"/>
                                        </div>
                                        
                                    </div> --}}
                                
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Soummettre</button>
                                    </div>
                                </form>
                                @endif
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
    </div>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addHobbieButton = document.getElementById('new_hobbie');
            const hobbieContainer = document.getElementById('group_hobbie');

            let hobbieCount = 1; // Start from 1 since we already have one input

            addHobbieButton.addEventListener('click', function() {
                hobbieCount++;

                const newHobbieContainer = document.createElement('div');
                newHobbieContainer.className = 'd-flex flex-row align-items-center mb-4';

                const newHobbieInput = document.createElement('input');
                newHobbieInput.type = 'text';
                newHobbieInput.name = `hobbie_nom[]`;
                newHobbieInput.placeholder = 'nom hobbie';
                newHobbieContainer.appendChild(newHobbieInput);

                const newHobbieDescriptionInput = document.createElement('input');
                newHobbieDescriptionInput.type = 'text';
                newHobbieDescriptionInput.name = `hobbie_description[]`;
                newHobbieDescriptionInput.placeholder = 'description hobbie';
                newHobbieContainer.appendChild(newHobbieDescriptionInput);

                hobbieContainer.appendChild(newHobbieContainer);
            });
        });
    </script> --}}
@endsection