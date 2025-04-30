@extends('layouts.app')

@section('title', 'S\'inscrire')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <div class="h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Je m'inscris</p>

                                <form class="mx-1 mx-md-4" name="register" method="post" action="{{ route('register') }}" id="register">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="nom" name="nom" class="form-control" />
                                            <label class="form-label" for="form3Example1c">Votre nom</label>
                                            @foreach ($errors->get('nom') as $error)
                                                <div class="alert alert-danger">
                                                    <p>{{ $error }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="prenom" name="prenom" class="form-control" />
                                            <label class="form-label" for="form3Example1c">Votre prenom</label>
                                            @foreach ($errors->get('prenom') as $error)
                                                <div class="alert alert-danger">
                                                    <p>{{ $error }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" name="email" class="form-control" />
                                            <label class="form-label" for="form3Example3c">Votre adresse courriel</label>
                                            @foreach ($errors->get('email') as $error)
                                                <div class="alert alert-danger">
                                                    <p>{{ $error }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="password" id="password" name="password" class="form-control" />
                                            <label class="form-label" for="form3Example4c">Votre mot de passe</label>
                                            @foreach ($errors->get('password') as $error)
                                                <div class="alert alert-danger">
                                                    <p>{{ $error }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
                                            <label class="form-label" for="form3Example4cd">Veuillez confirmer votre mot de passe</label>
                                            @foreach ($errors->get('password_confirmation') as $error)
                                                <div class="alert alert-danger">
                                                    <p>{{ $error }}</p>
                                                </div>
                                            @endforeach
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
    </div>
@endsection