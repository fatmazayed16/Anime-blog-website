<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/post.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>our blog</title>
</head>
<body>
    <header> <!----------------------HEADER------------------------>
        <div class="cust_data">
            @if(Auth::check())
        
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method = "POST" >
          @csrf
        </form>

        @foreach($data as $x)
        <div  class="avatar">
            <a href="{{ route('user.profile') }}"><img src="{{url($x->image_path)}}" alt="img"></a>
            <a href="{{ route('user.profile') }}"><h3>{{$x->first_name.' '.$x->last_name}}</h3></a>
        </div>
        @endforeach

        @else
        <a href="/login">login / register</a>

        @endif
        </div>
        <a href="/" class="logo_admin">OBLOG</a>
        </header>
    <!---------------------------------------------------->





    <!-------------------NAVBAR--------------------------->
    <section class="sticky">
        <div class="navbar">
            <ul dir="rtl">
                <li><a href="/">NewAnime </a></li>
                <li><a href="/Movies">Movies</a></li>                
                <li><a href="/Manga">Manga</a></li>
            </ul>
        
        
        </div>
    </section><!---------------------------------------------------->

    <section>
        <div class="content1">
            <div class="main-artical">
                @foreach ($post as $a )
                    <a href="#"><img src="{{ url('image/postPic/'.$a->image_path) }}"></a>
                    
                    <h1 align="center">{{$a->title}}</h1>
                    <p>    
                        {{$a->description}}
                    </p>
                    
                        <small>created_at {{$a->created_at}}</small>
                    @endforeach

                    <div class="creator">
                                           
                        
                        <div class="icon-image">
                            <a ><img src="{{ url($image_path) }}"></a>
                        </div>
                        <div class="icon-words">
                            <h1>Creator</h1>
                            <a ><h3>{{$name}}</h3></a>
                           
                        </div>
                    </div>

<!------------------------------------------------------------------------------------------------------>

                @if (Auth::check())
            <form method="POST" action="{{route('ahmed')}}" >
                @csrf
                    <div class="comment">
                        
                        <textarea type="text" class="input" placeholder="Write a comment" name="description" v-model="newItem" @keyup.enter="addItem()"></textarea>
                        {{-- <button v-on:click="addItem()" class='primaryContained float-right' type="submit" value="POST">Add Comment</button> --}}
                        <input class='primaryContained float-right' type="submit" value="POST">
                        
                    </div>
                </form>
                @endif

                
                @foreach ($commentname as $c )
                                    
                <div class="creator">
                    <div class="icon-image">
                        <a ><img src="{{ url($c->image_path) }}"></a>
                        {{-- <a href="Profile/{{ $c->id }}"><img src="{{ url('image/avatar/'.$c->image_path) }}"></a> --}}
                    </div>
                    <div class="icon-words">

                        <a ><h3>{{$c->name}}</h3></a>
                        <p>{{$c->description}}</p>

                    </div>
                </div>
                @endforeach

            </div>
            
            <div class="main-aside">
                <h2>Pined</h2>
                @foreach ($pined as $p) 
                
                <a href={{"/PostPage/".$p->id}}><img src="{{ url('image/postPic/'.$p->image_path) }}"></a>
                {{-- <div class="insides" style='colore:white'> --}}

                <h3 style="color: white" ><a href={{"/PostPage/".$p->id}}>{{$p->title}} </a></h3>
                @endforeach
                
                
            </div>
            
        </div>
    </section>



    <!---------------------footer------------------------->
    <footer>
        <div class="footer-top-area">

            <div class="container">
                <div class="footer-about-us">
                <h2><span>our blog</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur,
                    modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                <div class="footer-social">
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-twitter-square"></i></a>
                </div>
                </div>
            </div>

            <div class="footer-menu">
                <h2 class="footer-wid-title">Help Center</h2>
                <ul>
                <li>Mobile Phone : 01000002222088821 </li>
                </ul>                        
            </div>

            <div class="footer-menu">
                <h2 class="footer-wid-title">User Navigation </h2>
                <ul>
                    <li><a href="#">our policies</a></li>
                    <li><a href="#">more about us</a></li>
                </ul>                        
            </div>

        </div>
    </footer>
</body>
</html>