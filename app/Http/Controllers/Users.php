<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Users extends Controller
{
    public function getdata()   {
        $data = User::where('id', Auth::user()->id)->get();
        return view("user.edit")->with('data',$data);
   } 

   public function postdata(UserEditRequest $request)
   {
    $data = $request->validated();

    $file_extension = $request -> file;
    
    
    $user = new User;
    if ($file_extension==null){
        User:: where('id', Auth::user()->id)->update(array
        ( 
            'name' => $data['name'],
            'first_name' => $data['first_name'] ,
            'last_name' => $data['last_name'],
            'email' => $data['email'],
             ));
        }

     else{
        $file_extension = $request -> file -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
    $path = 'C:\xampp\htdocs\blog-master\public\image\avatar';
    $request -> file -> move($path,$file_name);
      User:: where('id', Auth::user()->id)->update(array
        ( 
            'name' => $data['name'],
            'first_name' => $data['first_name'] ,
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'image_path' =>"image\avatar\\".$file_name,
             ));
            }
        $user->update();
        return redirect(route('user.edit'))->with('profile successfully updated');
     }
}

