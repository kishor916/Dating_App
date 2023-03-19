<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessagesController extends Controller
{
    public function inbox(){
         $messages = auth()->user()->receivedMessages()
         ->with('sender')
            ->latest()->get();

         return view('messages-inbox', compact('messages'));

    }

    public function show(User $user){
        $messages = Message::where(function($query) use ($user){
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user){
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->id());
        })->with('sender')
            ->latest()
            ->get();

        return view('messages-show.blade.php', compact('user', 'messages'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required'
        ]);

        auth()->user()->sendMessage($user, $request->message);

        return redirect()->back();
    }

//    public function createMessage(){
//        return view('create-message');
//    }

}
