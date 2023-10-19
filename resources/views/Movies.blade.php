<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/home1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>Movies</title>
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
        <a href="/" class="logo_admin"> O BLOG</a>
    
    </header><!---------------------------------------------------->



    <section>
    <!-------------------NAVBAR--------------------------->
    
    <section class="sticky">
        <div class="navbar">
            <ul dir="rtl">
                <li><a href="/">NewAnime </a></li>
                <li><a href="/Movies">Movies</a></li>                
                <li><a href="/Manga">Manga</a></li>
            </ul>
        </div>
    </section>

    <!---------------------------------------------------->
        <div class="content1">
            <div class="main-artical">
            
                        @foreach ($unpined as $p)
                        <li>
                        <a href="PostPage/{{ $p->id }}"><img src="{{ url('image/postPic/'.$p->image_path) }}"></a>
                        <h3 style="color: white" ><a href="PostPage/{{ $p->id }}">{{$p->title}} </a></h3>
                        <small float='left' style="color: white">Created at {{$p->created_at}}</small>

                        </li>
                        @endforeach
            </div>


            
                                               
                        <div class="main-aside">
                            <h2>Pined</h2>
                            @foreach ($pined as $p) 
                            <a href="PostPage/{{ $p->id }}"><img src="{{ url('image/postPic/'.$p->image_path) }}"></a>
                            <h3 style="color: white" ><a href="PostPage/{{ $p->id }}">{{$p->title}} </a></h3>
                            @endforeach                                                        
                        </div>
                    </div>
                    
            </div>                                   
                
                
            
        </div>
        </div>
    </section>



    <!---------------------footer------------------------->
    <footer>
        <div class="footer-top-area">

            <div class="container">
                <div class="footer-about-us">
                <h2><span>our blog</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
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