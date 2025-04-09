@extends('layouts.app', ['page' => __('Suggestions de personnes'), 'pageSlug' => 'suggestions'])

@section('content')

<style>
    /* Effet de hover pour les éléments de la carte */
    .font-icon-list .font-icon-detail {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 15px; /* Ajout d'un peu d'espace autour de l'icône */
        border-radius: 10px; /* Ajoute des bords arrondis pour un effet plus doux */
    }

    .font-icon-list .font-icon-detail:hover {
        transform: scale(1.1); /* Agrandit l'élément */
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); /* Ajoute une ombre portée */
        cursor: pointer; /* Change le curseur pour indiquer qu'il est interactif */
        background-color: black; /* Change légèrement le fond au survol */
    }

    /* Optionnel: Ajouter un peu d'espace entre les cartes */
    .font-icon-list {
        margin-bottom: 20px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="title">Suggestions</h3>
                <p class="category">Personnes avec des hobbies similaires</p>
            </div>
            <div class="card-body all-icons">
                <div class="row">
                    @foreach($suggestedPersonnes as $suggestedPersonne)
                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                            <div class="font-icon-detail">
                               
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ $suggestedPersonne->prenom }} {{ $suggestedPersonne->nom }}</p> 
                                <p></p> 
                                
                              
                                <p class="text-muted">
                                    @foreach($suggestedPersonne->common_hobbies as $hobby)
                                        {{ $hobby->nom }}<br>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                   
                    @if($suggestedPersonnes->isEmpty())
                        <div class="col-12">
                            <p>Aucune suggestion disponible pour le moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection