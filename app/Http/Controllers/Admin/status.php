<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\View;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Contracts\View\View as ViewView;

class status extends Controller
{
    public function st() {
       $date = new Carbon();
            $monthlyp =sizeof(Post::select('id',)->whereMonth('created_at', Carbon::now()->month)
            ->whereyear('created_at', Carbon::now()->year)->get());

            $monthlyu = sizeof(User::select('id',)->whereMonth('created_at', Carbon::now()->month)
            ->whereyear('created_at', Carbon::now()->year)->get());
            $monthlyv =View::select('views',)->whereMonth('created_at', Carbon::now()->month)
            ->whereyear('created_at', Carbon::now()->year)->get();
            
          return view('admin.status')->with('visitor',json_encode($this->yd()))->with('datas' ,$monthlyp)->with('datao',$this->g($monthlyv,'views'))->with('datau',$monthlyu) ;
    
    }
    // private function dwcs($table,$s=array()){
    
    // }
    // private function dwcg($table,$s=array()){
    //      $record = Order::select($table)
    //          ->where($s)->get();
    //      return $record ;
    //  }
    private function yd(){
        for ($f=0;$f<=3;$f++){
            switch ($f) {
                case 0:

                    $z[0][$f] = 'Year'." ".Carbon::now()->format('Y');
                    break;
                case 1 :
                    $z[0][$f] = 'Users';
                    break;
                case 2:
                    $z[0][$f] = 'Posts';
                    break;
                case 3:
                    $z[0][$f] = 'Views';
                    break;
            }}
        for($i=1 ;$i<=12; $i++){
            for($x=0;$x<=3;$x++){
                switch ($x) {
                    case 0:
                        $z[$i][$x] = date('F', mktime(0, 0, 0, $i, 1));
                        break;
                    case 1:
                        $z[$i][$x] =  sizeof(User::select('id',)->whereMonth('created_at', Carbon::createFromFormat('d-m-Y', "1-$i-2021")->month)
                        ->whereyear('created_at', Carbon::now()->year)->get());
                        break;
                    case 2:
                        $z[$i][$x] =  sizeof(Post::select('id',)->whereMonth('created_at', Carbon::createFromFormat('d-m-Y', "1-$i-2021")->month)
                        ->whereyear('created_at', Carbon::now()->year)->get());
                        break;
                    case 3;
                   
                        $z[$i][$x] = $this->g(view::select('views',)->whereMonth('created_at', Carbon::createFromFormat('d-m-Y', "1-$i-2021")->month)
                        ->whereyear('created_at', Carbon::now()->year)->get(),'views');
                        break;
                }
            }
        }
        return $z ;
    }
    private function g($x ,$a){
        foreach($x as $s)
        return $s->$a;
    }
}

