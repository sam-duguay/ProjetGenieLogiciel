@extends('layouts.app')

@section('content')
<div class="container ps-4">
    <h1>Créer un nouveau message</h1>
    <form action="{{ route('messages.store', $users->id) }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Sujet</label>
                <input type="text" class="form-control" name="subject" placeholder="Sujet"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control" placeholder="Salut {{ $personne->prenom . ' ' . $personne->nom  }}! Comment ça va?">{{ old('message') }}</textarea>
            </div>

            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Envoyer</button>
            </div>
        </div>
    </form>
</div>
@stop
