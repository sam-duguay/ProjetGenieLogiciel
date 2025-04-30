@extends('layouts.app')

@section('title', 'Connexion')

@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

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
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Page de connexion</p>

                                <form class="mx-1 mx-md-4" name="login" method="post" action="{{ route('connexion') }}" id="login">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Votre adresse courriel" />
                                            <label class="form-label" for="email">Votre adresse courriel</label>
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
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Votre mot de passe" />
                                            <label class="form-label" for="password">Votre mot de passe</label>
                                            @foreach ($errors->get('password') as $error)
                                                <div class="alert alert-danger">
                                                    <p>{{ $error }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Connexion</button> 
                                    </div>
                                    
                                </form>
                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <p><a href="{{ route('inscription') }}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Créer un compte</a></p>
                                </div>
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