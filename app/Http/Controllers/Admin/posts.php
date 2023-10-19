<?php

namespace App\Http\Controllers\Admin;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class posts extends Controller
{
    public function getdata()
    {
        $data = Post::all();
        return view('admin.posts')->with('data',$data);
    }
    public function update(Request $request)
    {
        $button = $request->input('submit');
        if ($button == "Add") {
            return redirect(route('admin.addposts'));
    }

    else if ($button == "View") {
        $id = $request->input('radio');
        session::put('postid',$id);
        return redirect(route('admin.vposts'));
        
    }
}
public function getdatav(){
    $id = session::get('postid');
    $data = Post::where('id',$id)->get();
    return view('admin.PostPage')->with('post',$data);
}
public function updatev(Request $request){
    $button = $request->input('submit');
    if ($button == "Confirm") {
        $s = new Post;
        $id = session::get('postid');
        Post::where('id',$id)->update(array('status'=>'confirmed'));
        $s->update();
        return redirect(route('admin.posts'));
    }
    else if ($button == "Delete") {
            $data_id = session::get('postid');
            $data0 = Comment::where('post_id',$data_id); 
            $data1 = Post::where('id',$data_id);  
            $data0->delete();
            $data1->delete();
            return redirect(route('admin.posts'));
}
else if ($button == "Edit") {
    return redirect(route('admin.editposts'));
}
else if ($button == "Pin/UnPin") {
    $pin=Post::where('id',session::get('postid'))->get();
    $pinnum=sizeof(Post::where('pined','pined')->get());
    if($this->g($pin ,'pined')!='pined' && $pinnum <=1){
    $s = new Post ;
    Post::where('id',session::get('postid'))->update(array('pined'=>'pined'));
    $s->update();
    }
    else{
        $s = new Post ;
    Post::where('id',session::get('postid'))->update(array('pined'=>'unpined'));
    $s->update();
    }
    return redirect(route('admin.posts'));
}
}

public function ed(){
    $id = session::get('postid');
    $data = Post::where('id',$id)->get();
    return view('admin.editpost')->with('data',$data);

}
public function edit(Request $request){
    $id = session::get('postid');
    $file_extension = $request -> file ;
    $s = new POST;
    if ($file_extension==null){
    Post::where('id',$id)->update(array('title'=>$request->input('title'),
    'category'=>$request->input('category'),'description'=>$request->input('description')
));
    }
    else{
        $file_extension = $request -> file -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'C:\xampp\htdocs\blog\public\image\postPic';
        $request -> file -> move($path,$file_name);
        Post::where('id',$id)->update(array('title'=>$request->input('title'),
        'category'=>$request->input('category'),'description'=>$request->input('description'),
        'image_path' => $file_name
    ));
    }
    $s->update();
    return redirect(route('admin.posts'));
    
}
    public function gd(){
        return view('admin.create');
    }
    public function add(Request $request){
        $file_extension = $request -> file -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'C:\xampp\htdocs\blog-master\public\image\postPic';
        $request -> file -> move($path,$file_name);
        $post = new Post();
        $post->user_id = 1;
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->description = $request->input('description');
        $post -> image_path = $file_name;
        $post->status = 'confirmed';
        $post->pined = 'unpined';
        $post->views = 0;
        $post->no_of_comment = 0;
        $post->save();

        return redirect(route('admin.posts'));

    }
    private function g($x ,$a){
        foreach($x as $s)
        return $s->$a;
    }
}

