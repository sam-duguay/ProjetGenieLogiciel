@extends('layouts.app')

@section('title', 'Page d\'Accueil')

@section('content')

<div class="div">
    <div class="row w-100">
        <img src=" {{ asset('asset/img/friends_meetup.webp') }}"
            class="img-fluid w-50 mx-auto" alt="Sample image">
    </div>
    <div class="row w-100 justify-content-center">
        <h2>Bienvenu sur rencontre<span class="plus">+</span></h2>
    </div>
    <p class="txt-page-index">Découvrez de nouvelles activités et connectez-vous avec des passionnés près de chez vous !

        Notre plateforme vous permet de participer à des événements et activités locales qui correspondent à vos centres d'intérêt. Que vous soyez passionné de sport, de culture, de cuisine ou simplement à la recherche de nouvelles expériences, vous trouverez facilement des rencontres et des événements organisés dans votre ville.

        Rejoignez notre communauté dynamique pour échanger, apprendre, et créer des liens durables avec des personnes qui partagent vos passions. Organisez ou rejoignez des groupes autour d'une activité qui vous plaît, et faites de chaque rencontre une expérience enrichissante !

        Avec notre site, tout est simple : recherchez, inscrivez-vous, et laissez-vous guider vers de nouvelles aventures. À très vite pour votre prochaine activité !</p>
</div>

@endsection