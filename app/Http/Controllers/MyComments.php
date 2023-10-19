<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;



class MyComments extends Controller
{
    public function commentdata()
    {


            $data = Comment::select("description")->where('user_id', Auth::user()->id)->get();
            $data0 = User::where('id', Auth::user()->id)->get();
            $commentname = Post::join('comments', 'comments.post_id', '=', 'posts.id')->where('comments.user_id',Auth::user()->id)->get();
   
      

            return view('user.mycomments')->with('data',$commentname)->with('data0',$data0);

        
    }    
}
