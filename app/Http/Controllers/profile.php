<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserPassRequest;

use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class profile extends Controller
{
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->get();
        return view('user.change_password')->with('data',$data);
    }

    public function update_password(UserPassRequest $request)

        {
            $data = $request->validated();
                    
            $user = new User ;
           $hashedPassword = User::select('password')->where('id',Auth::user()->id)->get();
        foreach($hashedPassword as $user )
           if (Hash::check($data['current_password'], $user->password)) 
           {
                if(strcmp($data['current_password'], $data['new_password']) == 0)
                {
                    return redirect()->back()->with("error","New Password cannot be same as your current password.");
                }
                else {
                   User::find(auth()->user()->id)->update(['password'=> Hash::make($data['new_password'])]);
                   $user->save();

                  return redirect(route('user.update_password'));  
               }
            } 
            else {
                return redirect()->back()->with("error","Your current password does not matches with the password.");
            }

        
    }
}



