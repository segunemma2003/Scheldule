<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;
use App\Comment;

class CommentController extends Controller
{
    public function comment(Request $request){

      
        $this->validate($request, [

            'comments'=> 'required|string',

        ]);

       
        
        $id=Auth::user()->id;
    
        $comment = new Comment([
     
        'comments'=>$request->comments,
        'user_id'=>$id,
        'post_id'=>$request->post_id

        ]);

        $comment->save();
        return redirect()->back();


    }
    
    /*public function showComment(){

    $rose = Comment::all();
    return view('social.user')->with('rose, $rose');
    

    }*/


}
