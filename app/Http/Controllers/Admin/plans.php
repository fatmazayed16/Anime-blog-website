<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Plan;
use Session;

class plans extends Controller
{
    public function getdata(){
        $data = Plan::all();
        return view('admin.plan')->with('data',$data);
    }
    public function update(Request $request){
        $button = $request->input('submit');
        if($button == 'Edit'){
        $request->validate([
                'radio' => ['required'],
            ]);
            $data_id = $request->input('radio');
            Session::put('planid',$data_id);
            Session::put('flage',1);
            $plan = Plan::where('id',$data_id)->get();
            Session::put('datas',$plan);
            return redirect(route('admin.plan'));
            }
        else if($button == 'Save'){
                $data_id = Session::get('planid');
                $s = new Plan;
                Plan::where('id',$data_id)->update(array('price'=>$request->input('price'),'no_of_post'=>$request->input('no_of_post')));
                $s->update();
                Session::put('flage',0);
                return redirect(route('admin.plan'));
                }
    }
}
