<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class plans extends Controller
{
    public function index(){
            $plan = Plan::all();
        return view('plan')->with('plan',$plan);
    }
    public function update(){
        $s= new User;
        User::where('id',Auth::user()->id)->update(['status' => 'premium']);
        $s->update();
        return redirect("/");
        }
}
