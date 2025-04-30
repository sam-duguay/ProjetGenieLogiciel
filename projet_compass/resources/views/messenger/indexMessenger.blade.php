@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Messagerie</h1>

        <!-- Liste des conversations -->
        <div class="list-group">
            @foreach ($conversations as $conversation)
                <a href="{{ route('messenger.show', $conversation->id) }}" class="list-group-item list-group-item-action">
                    Conversation #{{ $conversation->id }}
                </a>
            @endforeach
        </div>

        <hr>

        <!-- Formulaire pour créer une nouvelle conversation -->
        <form action="{{ route('messenger.start') }}" method="GET">
            <button type="submit" class="btn btn-primary">Démarrer une nouvelle conversation</button>
        </form>
    </div>
@endsection
