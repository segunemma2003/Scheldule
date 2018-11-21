<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;
use App\User;

class ChatController extends Controller
{

    public function friends(){

        $users = User::all();
    
        return view('social.friends', compact('users'));
    }

    public function myChat(Request $request){

        $this->validate($request, [
            'message' => 'required|string',
        ]);

        $id=Auth::user()->id;
        $message = new Message([
         'message'=>$request->message,
         'user_id'=>$id

        ]);
        
        $message->save();
        return redirect()->back();          
        
    }


    public function chat(){
       
        $messages = Message::all();

        return view('social.chat',compact('messages'));
    }
}
