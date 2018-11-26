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

    public function store(Request $request){

        $this->validate($request, [
            'message' => 'required|string',
        ]);
       
        $id=Auth::user()->id;
        $message = new Message([

         'message'=>$request->message,
         'user_id'=>\Auth::user()->id,
         'receiver_id'=>$request->receiver_id

        ]);

        
        
        if($message->save()){
        
        }else{
         return redirect()->back()->with('status', 'Your message was not sent');
        }
                 
        
    }


    public function chat($id){   
        
        $receiver=User::whereId($id)->first();

        return view('social.chat',compact('receiver'));  
    }

    
}

