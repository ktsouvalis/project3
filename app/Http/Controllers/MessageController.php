<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages')->with('messages', $messages);
    }

    public function store(){
        $message = Message::create([
            'content' => request('content'),
            'user_id' => auth()->id()
        ]);
    }
}