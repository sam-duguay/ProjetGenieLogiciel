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
    <div class="h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-7 col-lg-9 ">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="justify-content-center">

                            <div class="row">

                                <p class="text-center h1 fw-bold mb-5 mx-auto  mt-4">Mise à jour du profile</p>
                              @if(isset($personne))  
                                <form class="row" method="post" action="{{ route('update', $id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <div class="mb-4 col-md-6 col-lg-6 col-xl-6">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="nom" value="{{ old('nom', $personne->nom) }}"/>
                                            <label class="form-label" for="form3Example1c">Votre nom</label>
                                            
                                        </div>
                                    </div>

                                    <div class="mb-4 col-md-6 col-lg-6 col-xl-6">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="number" id="age" class="form-control" name="age" value="{{ old('age', $personne->age) }}" />
                                            <label class="form-label" for="form3Example3c"> Votre age</label>
                                        </div>
                                    </div>

                                    <div class="mb-4 col-md-6 col-lg-6 col-xl-6">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="prenom" value="{{ old('prenom', $personne->prenom) }}" />
                                            <label class="form-label" for="form3Example1c">Votre Prenom</label>
                                        </div>
                                    </div>

                                    <!-- Ajuster l'affichage du statut quand il est sélectionné -->
                                    <div class="mb-4 col-md-3 col-lg-3 col-xl-3">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">

                                        <select name="statut" id="statut" class="form-select form-select-sm w-100" aria-label=".form-select-sm example">
                                            <option value="professeur" {{ old('statut', $personne->statut) == 'professeur' ? 'selected' : '' }}>
                                                Professeur
                                            </option>
                                            <option value="etudiant" {{ old('statut', $personne->statut) == 'etudiant' ? 'selected' : '' }}>
                                                Étudiant
                                            </option>
                                        </select>

                                            <br>
                                            <label class="form-label" for="statut">Sélectionner votre statut</label>
                                        </div>
                                    </div>

                                    <div class="mb-4 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="sexe" id="sexe" class="form-select custom-select-style w-100">
                                                <option value="femelle" {{ old('sexe', $personne->statut) == 'femelle' ? 'selected' : '' }}>
                                                    Femme
                                                </option>
                                                <option value="male" {{ old('sexe', $personne->statut) == 'male' ? 'selected' : '' }}>
                                                    Homme
                                                </option>
                                            </select>
                                            <br>
                                            <label class="form-label" for="sexe">Sélectionner votre sexe</label>
                                        </div>
                                    </div>

                                    <div class="mb-4 col-md-6 col-lg-6 col-xl-6">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="file" id="photo" class="form-control" name="photo" value="{{ $personne->photo  }}" />
                                            <label class="form-label" for="form3Example3c">Téléverser votre photo</label>
                                        </div>
                                    </div>

                                    <div class="mb-4 col-md-6 col-lg-6 col-xl-6">
                                        <p>Sélectionner votre Programme / Discipline</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="discipline_id" id="discipline_id" class="form-select custom-select-style w-100">
                                                @foreach ($disciplines as $discipline )
                                                    <option value="{{ $discipline->id}}">
                                                        {{ $discipline->noProgramme.", ". $discipline->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <div class="mb-4 col-md-6 col-lg-6 col-xl-6">
                                        <p>Sélectionner vos hobbies</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="hobbies[]" id="hobbies" class="form-select custom-select-style w-100" multiple>
                                                @foreach ($hobbies as $hobbie)
                                                    <option value="{{ $hobbie->id }}" {{ $personne->hobbies->contains($hobbie->id) }}>{{ $hobbie->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 col-md-6 col-lg-6 col-xl-6">
                                        <p>Sélectionner vos intérêts</p>
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select class="w-100" name="interets[]" id="interets" class="form-select custom-select-style" multiple>
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
                                    <div class="d-flex flex-row align-items-center mb-4" id="group_hobbie">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="hobbie_nom" class="form-control" name="hobbie_nom[]" placeholder="nom hobbie"/>
                                            <input type="text" id="hobbie_description" class="form-control" name="hobbie_description[]" placeholder="description hobbie"/>
                                        </div>
                                        
                                    </div> -->
                                
                                    <div class="mb-4 col-xl-12">
                                        <div class='d-flex justify-content-center'>
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg w-25">Soumettre</button>
                                        </div>
                                    </div>
                                </form>
                                @endif


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