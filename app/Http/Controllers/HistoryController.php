<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class HistoryController extends Controller
{
    protected $message;

    public function __construct(Message $message){
        $this->message = $message;
    }

    public function index(){
        $dates = $this->message->select('date')->distinct()->get();
        $total_messages = $this->message->select('date')->distinct()->count();
        return  view('history', compact('dates', 'total_messages'));
    }

    public function show($date){
        $messages = $this->message->with('user')->where('date', $date)->get();
        return view('history_show', compact('messages'));
    }
}
