<!DOCTYPE html>
<html lang="fr-ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rencontre+ - @yield('title')</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/favicon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('asset/css/nucleo-icons.css') }}" rel="stylesheet" />

    <!-- CSS -->
    <link href="{{ asset('asset/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/theme.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <!-- Elle s'affiche seulement si l'attribut show_sidebar est retourné à true dans le controller en question -->
        @if(isset($show_sidebar) && $show_sidebar)
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <p class="simple-text">Rencontre +</p>
                </div>
                <br>

                <ul class="nav">
                    <li></li>
                    <li>
                        {{-- <a href="{{ route('suggestion.index') }}">
                        <i class="fab fa-laravel"></i>
                        <span class="nav-link-text">Suggestions</span>
                        </a> --}}
                        {{-- @php
                            $personne = Auth::user()->personne;
                        @endphp --}}

                        @if(Auth::check() && empty(Auth::user()->personne->photo) && Auth::user()->personne->id)
                        <a href="{{ route('fillprofile', ['id' => Auth::user()->personne->id]) }}">
                            <i class="fab fa-laravel"></i>
                            <span class="nav-link-text">Compléter mon profil</span>
                        </a>
                        @else
                        <a href="{{ route('suggestion.index') }}">
                            <i class="fab fa-laravel"></i>
                            <span class="nav-link-text">Suggestion</span>
                            <b class="caret mt-1"></b>
                        </a>
                        @endif
                    </li>
                    <li>
                        <a href="{{ route('messages') }}">
                            <i class="fab fa-laravel"></i>
                            <span class="nav-link-text">Messagerie</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endif



        <!-- Le main panel qui contiendra la navbar -->
        <div class="main-panel">

            <!-- La navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">

                <div class="container-fluid">

                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>

                        </div>

                        <!-- <a class="navbar-brand" href="/">Accueil</a> -->
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab">555</span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">

                            @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is( 'home') ? 'active' : ''}}" href=" {{ route('home') }}">
                                    Accueil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is( 'fillprofile') ? 'active' : ''}}" href="{{ 'fillprofile/' . Auth::user()->personne->id }}">
                                    Mettre à jour profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is( 'logout') ? 'active' : ''}}" href="{{ route('logout') }}">
                                    Déconnexion
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/messages">Messages @include('messenger.unread-count')
                                </a>
                            </li class="nav-item">
                            <li>
                                <a class="nav-link" href="{{ route('messages.create')}}">Create New Message</a>
                            </li>

                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    Connexion
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('inscription') }}">
                                    Se créer un compte
                                </a>
                            </li>
                            @endif

                            <li class="separator d-lg-none"></li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content container-fluid {{ isset($show_sidebar) && $show_sidebar ? '' : 'px-0' }}">
                @yield('content')
            </div>


            <!-- Le footer -->

            <footer class="footer">
                <div class="container-fluid">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="https://creative-tim.com" target="blank" class="nav-link">
                                CEGEP Trois-Rivières
                            </a>
                        </li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</body>
@stack('js')
@stack('scripts')

</html>