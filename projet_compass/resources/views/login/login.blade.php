@extends('layouts.app')

@section('titre', 'Rencontre+ | S\'inscrire')

@if(isset($errors) && $errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif