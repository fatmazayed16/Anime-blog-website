<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserProfile extends Controller
{
     public function profiledata()   

     {
          $this->d(User::select('status')->where('id', Auth::user()->id)->get(),'status') == 'premium'? $flage = 1 : $flage = 0;
        $data = User::where('id', Auth::user()->id)->get();
        return view("user.prof")->with('data',$data)->with('flage',$flage);

      //   return view("user.mycomments")->with('data',$data);
     } 
     public function d($s,$x){
          foreach($s as $a)
         return  $a->$x ;
     }  
}
