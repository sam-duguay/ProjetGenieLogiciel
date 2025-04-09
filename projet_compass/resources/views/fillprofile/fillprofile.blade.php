@extends('layouts.app')

@section('titre', 'Rencontre+ | Profile')

@if(isset($errors) && $errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Profile</p>

                                <form class="mx-1 mx-md-4" method="post" action="{{ route('update', $id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="nom" placeholder="Votre Nom" />
                                            <label class="form-label" for="form3Example1c">Votre nom</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="prenom" placeholder="Votre Prenom" />
                                            <label class="form-label" for="form3Example1c">Votre Prenom</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <select name="statut" id="statut"class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option value="professeur">professeur</option>
                                                <option value="etudiant">etudiant</option>
                                            </select>
                                            <label class="form-label" for="form3Example1c">Sélectionner votre statut</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="photo" class="form-control" name="photo" placeholder="Url pour votre photo" />
                                            <label class="form-label" for="form3Example3c">Url pour votre photo</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="number" id="age" class="form-control" name="age" placeholder="Votre age" />
                                            <label class="form-label" for="form3Example3c"> Votre age</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="sexe" id="sexe" class="form-select custom-select-style">
                                                <option value="femelle">femelle</option>
                                                <option value="male">male</option>
                                            </select>
                                            <label class="form-label select-label" for="sexe">Sélectionner votre sexe</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="discipline_id" id="discipline_id" class="form-select custom-select-style">
                                                @foreach ($disciplines as $discipline )
                                                    <option value="{{ $discipline->id}}">
                                                        {{ $discipline->noProgramme." , ". $discipline->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label select-label" for="discipline_id">Sélectionner votre Programme / Discipline</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                                        <div class="form-outline flex-fill mb-0 position-relative">
                                            <select name="programme_id" id="programme_id" class="form-select custom-select-style">
                                                @foreach ($programmes as $programme )
                                                    <option value="{{ $programme->id }}">
                                                        {{ $programme->noProgramme}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label select-label" for="programme_id">Sélectionner votre Programme</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Soummettre</button>
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
    </div>
</section>