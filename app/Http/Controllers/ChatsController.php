<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Events\MessageSent;

class ChatsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $date = date('Y-m-d H:i:s', time());
        return view('chat', compact('date'));
    }

    public function fetchMessages(){
        return Message::with('user')->where('date', date('Y-m-d'))->get();
    }

    public function sendMessages(Request $request){

        $user = Auth::user();

        if(!empty($request->input('message')))
        {
            $message = $user->messages()->create([
                'message' => $request->input('message'),
                'date' => date('Y-m-d')
            ]);

            broadcast(new MessageSent($user, $message))->toOthers();

            return ['status' => 'Message Send!'];
        }else{
            return ['status' => 'Message no send'];
        }

    }
}
