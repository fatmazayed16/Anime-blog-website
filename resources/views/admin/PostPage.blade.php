<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/admin/post.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>our blog</title>
</head>
<body>
    <header> <!----------------------HEADER------------------------>
        <div class="cust_data">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">logout</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method = "POST" >
          @csrf
      </form>
        </div>
        <a href="/" class="logo_admin">OBLOG</a>
    </header><!---------------------------------------------------->
    <!-------------------NAVBAR--------------------------->
    <section class="sticky">
        <div class="navbar">
            <ul dir="rtl">
        
            </ul>
        
        
        </div>
    </section><!---------------------------------------------------->

    <section>
        <form class="form0"  method="POST" action"{{ route('admin.vposts') }}:>
            @csrf
            <input class="favorite styled" type="submit" name="submit" value="Confirm">
            <input class="favorite styled" type="submit" name="submit" value="Delete">
            <input class="favorite styled" type="submit" name ="submit" value="Edit">
            <input class="favorite styled" type="submit" name ="submit" value="Pin/UnPin">
           </form>
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