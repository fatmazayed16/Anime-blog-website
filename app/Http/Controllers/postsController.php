<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Http\Requests\PostRequest;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $s = new View;
        $date = sizeof(View::select('views')->whereMonth('created_at', Carbon::now())
                        ->whereyear('created_at', Carbon::now())->get());
        if ($date!=0) {
        View::increment('views');
        $s->update();
        }
         else{
            $s->views = 1;
            $s->save();
         }

        Auth::check()? $data = User::where('id', Auth::user()->id)->get():$data = 0;
    

        $pined= Post::where('pined','pined')->get(); 
        $unpined= Post::where('pined','unpined')->where('status' , 'confirmed')->where('category','New Anime')->get(); 
        
            return view('NewAnime')->with('pined' , $pined)->with('unpined' , $unpined)->with('data' , $data);
    
        
    }
    public function indexmo()
    {   
        
        
        $s = new View;
        $date = sizeof(View::select('views')->whereMonth('created_at', Carbon::now())
                        ->whereyear('created_at', Carbon::now())->get());
        if ($date!=0) {
        View::increment('views');
        $s->update();
        }
         else{
            $s->views = 1;
            $s->save();
         }

        Auth::check()? $data = User::where('id', Auth::user()->id)->get():$data = 0;

        $pined= Post::where('pined','pined')->get(); 
        $unpined= Post::where('pined','unpined')->where('status' , 'confirmed')->where('category','Movies')->get(); 
        
            return view('Movies')->with('pined' , $pined)->with('unpined' , $unpined)->with('data' , $data);
    
        
    }
    public function indexma()
    {   
        
        
        $s = new View;
        $date = sizeof(View::select('views')->whereMonth('created_at', Carbon::now())
                        ->whereyear('created_at', Carbon::now())->get());
        if ($date!=0) {
        View::increment('views');
        $s->update();
        }
         else{
            $s->views = 1;
            $s->save();
         }

        


        Auth::check()? $data = User::where('id', Auth::user()->id)->get():$data = 0;
    

        $pined= Post::where('pined','pined')->get(); 
        $unpined= Post::where('pined','unpined')->where('status' , 'confirmed')->where('category','Manga')->get(); 
        
            return view('Manga')->with('pined' , $pined)->with('unpined' , $unpined)->with('data' , $data);
    
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        
        $data = $request->validated();
       

        $file_extension = $request -> file -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'C:\xampp\htdocs\blog-master\public\image\postPic';
        $request -> file -> move($path,$file_name);


        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $post->category = $data['category'];
        $post->description = $data['description'];
        $post->image_path = $file_name;
        $post->status = 'unconfirmed';
        $post->pined = 'unpined';
        $post->views = 0;
        $post->no_of_comment = 0;
        $post->save();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pt =session::get('postid');
        
        if ($pt != $id) {
            
        $s = new Post;
        Post::where('id',$id)->increment('views');
        $s->update();
            
        }

        
        // session::put('posts', 1 );
        session::put('postid', $id);
        $pined= Post::where('pined','pined')->get(); 
        
        // $comment = Comment::where('post_id',$id)->get();
        Auth::check()? $data = User::where('id', Auth::user()->id)->get():$data = 0;
        // $post->user_id = Auth::user()->name; 
        if($this->d(Post::where('posts.id',$id)->get(),'user_id')==1 ){ 
            $name ='admin';
            $image_path='image/123.png';
        }

         else{
            $name =$this->d(Post::join('users', 'posts.user_id', '=', 'users.id')
            ->select('users.name')->where('posts.id',$id)
            ->get(),'name');
            $image_path=$this->d(Post::join('users', 'posts.user_id', '=', 'users.id')
            ->select('users.image_path')->where('posts.id',$id)
            ->get(),'image_path');
      
         }

        $commentname = Comment::join('users', 'comments.user_id', '=', 'users.id')
        ->select('name','description' , 'image_path')->where('comments.post_id',$id)
        ->get();

        $post = Post::where("id",$id)->get();

        return view('PostPage')->with('post',$post)->with('commentname',$commentname)->with('image_path',$image_path)->with('name',$name)->with('pined',$pined)->with('data',$data);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request ,Post $post)
    {
        // $data = $request->validate();
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        // $post->image_path = $data['image_path'];
        // $post->category = $data['category'];
        // $post->status = $data['status'];
        // $post->pined = $data['pined'];
        // $post->no_of_comment = $data['no_of_comment'];
        // $post->save();

        // return redirect()->route('/', $post->$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
    private function d($s , $x){
    foreach ($s as $a)
    return $a->$x ;
    }
    
}
