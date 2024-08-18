<?php

namespace App\Http\Controllers\Backend;

use App\Events\MessageEvent;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    function index() {
        $userId = auth()->user()->id;
        // fetch sender id in chat database
        $chatUsers= Chat::with('senderProfile')->select(['sender_id'])
        ->where('receiver_id', $userId) //admin will receive the data
        ->where('sender_id','!=', $userId)
        ->groupBy('sender_id')
        ->get();

        return view('admin.messenger.index', compact('chatUsers'));
    }
    function getMessages(Request $request) {
        $senderId = auth()->user()->id;
        $receiverId = $request->receiver_id;


        $messages =Chat::whereIn('receiver_id',[$senderId, $receiverId])
        ->whereIn('sender_id',[$senderId, $receiverId])
        ->orderBy('created_at', 'asc')
        ->get();

        // if e select ang user sa icon set ang seen to 1
        Chat::where(['sender_id'=>$receiverId, 'receiver_id'=>$senderId])->update(['seen'=>1]);

        return response($messages);

    }

    function sendMessage(Request $request) {
        $request->validate([
            'message'=>['required'],
            'receiver_id'=>['required']
        ]);

        $message =new Chat();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->message=$request->message;
        $message->save();

        broadcast(new MessageEvent($message->message, $message->receiver_id, $message->created_at));

        return response(['status'=>'success','message'=>'Message sent successfully']);


    }
}