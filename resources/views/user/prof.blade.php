<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{ url ( 'css/prof.css' ) }} ">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profile</title>
</head>

<body>
    <header> <!----------------------HEADER------------------------>
        <a href="/" class="logo_admin">o blog</a>


         
        
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
   <div class="main">
        <div class="content">
            <form method="POST" class="user" action="{{ route('user.profile') }}">
            @csrf
            @foreach ($data as $x)
                <div class="info">
                    <div class="input-box">
                        <label for="20">first Name</label>
                        <input type="text" id="20" name="first name" value="{{$x->first_name}}" readonly>
                    </div>
                    <div class="input-box">
                        <label for="Last">Last Name</label>
                        <input type="text" id="21"  name="last name" value="{{$x->last_name}}" readonly>
                    </div>
                    <div class="input-box">
                        <label for="User">User_name</label>
                        <input type="text" id="23" name="user name" value="{{$x->name}}" readonly>
                    </div>
                    <div class="input-box">
                        <label for="Email">Email</label>
                        <input type="email" id="24"  name="email" value="{{$x->email}}" readonly>
                    </div>
                </div>
                @if($flage == 0)
                <div class="up" >
                    <label for ="a"><input type="submit" class="btn btn-primary btn-user btn-block" value="view plan" onclick="event.preventDefault();document.getElementById('a').click();"></label>
                    <a href="{{route('user.plan')}}" id ='a'></a>
                    
                </div>
                @else
                <div class="up" >
                    <label for ="a"><input type="submit" class="btn btn-primary btn-user btn-block" value="make post" onclick="event.preventDefault();document.getElementById('a').click();"></label>
                    <a href="\create" id ='a'></a>
                </div>
                    @endif
           
        </div>
        
        <div class="card">
            <div class="picture">
                <img src="{{url($x->image_path)}}" alt="">
                    <div>{{$x->first_name.' '.$x->last_name}}</div>
            </div>
            @endforeach    
            </form>


            <div class="list">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">
                            <div>Home</div>
                            <i class="fa-solid fa-house-chimney"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.profile') }}">
                            <div>My Profile</div>
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.edit') }}">
                            <div>Edit Profile</div>
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.update_password') }}">
                            <div>Edit Password</div>
                            <i class="fa-solid fa-key"></i>
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{ route('user.comments') }}">
                            <div>My Comments</div>
                            <i class="fa-solid fa-comments"></i>
                        </a>
                    </li>

                </ul>
                <div class="out">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method = "POST" >
                        @csrf
                        </form>
              

                </div>
            </div>
        </div>
        
    </div>
</body>

</html>