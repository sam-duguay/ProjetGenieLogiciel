@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

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
                <p class="category">Hobbies</p>
            </div>
            <div class="card-body all-icons">
                <div class="row">
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-alert-circle-exc"></i>
                            <p>icon-alert-circle-exc</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-align-center"></i>
                            <p>icon-align-center</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-align-left-2"></i>
                            <p>icon-align-left-2</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-app"></i>
                            <p>icon-app</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-atom"></i>
                            <p>icon-atom</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-attach-87"></i>
                            <p>icon-attach-87</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-badge"></i>
                            <p>icon-badge</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-bag-16"></i>
                            <p>icon-bag-16</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-bank"></i>
                            <p>icon-bank</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                        <div class="font-icon-detail">
                            <i class="tim-icons icon-basket-simple"></i>
                            <p>icon-basket-simple</p>
                        </div>
                    </div>
                    <!-- Ajoute d'autres éléments ici -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
