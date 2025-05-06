<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}">
    <div class="container">
    <div class="row">
        <h4 class="media-heading">
            <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
            ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
    </div>
    <div class="row">
        <p>
            {{ $thread->latestMessage->body }}
        </p>
    </div>
    <div class="row">
        <p>
            <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>
        </p>
    </div>
    <div class="row">
        <p>
            <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
        </p>
    </div>
    </div>
</div>