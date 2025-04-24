@extends('layouts.app')

@section('title', 'Page d\'Accueil')

@section('content')

<p>Ceci est un test de contenu</p>

<p> route('fillprofile/' . Auth::user()->id) </p>
@endsection
