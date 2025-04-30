@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Conversation #{{ $thread->id }}</h1>

    <!-- Liste des messages -->
    <div class="list-group">
        @foreach ($thread->messages as $message)
            <div class="list-group-item">
                <strong>{{ $message->sender->name }} :</strong>
                <p>{{ $message->body }}</p>
            </div>
        @endforeach
    </div>

    <hr>

    <!-- Formulaire pour envoyer un message -->
    <form action="{{ route('messenger.send', $thread->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="message" class="form-control" rows="3" placeholder="Écrire un message..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
    </form>
</div>
@endsection
