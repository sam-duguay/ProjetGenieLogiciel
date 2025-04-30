<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RTippin\Messenger\Models\Conversation;
use RTippin\Messenger\Models\Message;
use RTippin\Messenger\Models\Thread;
use Illuminate\Support\Facades\Auth;
use RTippin\Messenger\Models\Messenger;
use App\Models\User;



class MessengerController extends Controller
{
    public function index()
    {
       // Récupère l'utilisateur connecté
       $user = Auth::user();
      

       // Utilise la méthode hasProvider() avec l'objet User (PAS son ID)
       $conversations = Thread::hasProvider($user)->get();

       return view('messenger.indexMessenger', compact('conversations'));
    }


    public function testConversation()
    {
        $recipient = User::where('email', 'william100@email.com')->first();

        $thread = Messenger::createThread([$recipient]);

        return redirect()->route('messenger.indexMessenger');
    }

    public function show($id)
    {
        // Récupérer la conversation via l'ID
        $thread = Messenger::thread($id); // Méthode pour récupérer une conversation par son ID

        // Si la conversation n'existe pas, rediriger avec un message d'erreur
        if (!$thread) {
            return redirect()->route('messenger.indexMessenger')->with('error', 'Conversation non trouvée');
        }

        // Passer la conversation à la vue
        return view('messenger.show', compact('thread'));
    }

    public function send(Request $request, $id)
{
    // Valider le message
    $request->validate([
        'message' => 'required|string|max:500',
    ]);

    // Récupérer la conversation
    $thread = Messenger::thread($id);

    // Envoyer le message
    $thread->sendMessage($request->message);

    // Rediriger avec un message de succès
    return redirect()->route('messenger.show', $thread->id)->with('success', 'Message envoyé');
}


public function start()
{
    // Exemple : tu veux démarrer une conversation avec un utilisateur spécifique
    // Remplace 1 par l'ID de l'utilisateur avec lequel tu veux démarrer la conversation.
    $recipient = User::find(1); // Remplace 1 par l'ID de l'utilisateur réel

    // Crée un nouveau fil de discussion (conversation)
    $thread = Messenger::createThread([$recipient]); // Crée une conversation avec l'utilisateur

    // Après avoir créé la conversation, redirige vers celle-ci
    return redirect()->route('messenger.show', $thread->id);
}
}
