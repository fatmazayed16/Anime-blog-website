<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{ url ( 'css/edit.css' ) }} ">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Profile</title>
</head>

<body>
    <header> <!----------------------HEADER------------------------>
        <div class="cust_data">
            
        </div>
        <a href="/" class="logo_admin">o blog</a>
    </header><!---------------------------------------------------->



   
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
    <!-- ----------------------------------------------------- -->
    <div class="main">
        <div class="content">
             <form method="POST" class="user" action="{{ route('user.edit') }}" enctype="multipart/form-data" >
            @csrf
            @foreach ($data as $a)
                <div class="info">
                    <div class="input-box">
                        <label for="20">first Name</label>
                        <input type="text" id="20" name="first_name" value="{{$a->first_name}}">
                    </div>
                    <div class="input-box">
                        <label for="Last">Last Name</label>
                        <input type="text" id="21"  name="last_name" value="{{$a->last_name}}">
                    </div>
                    <div class="input-box">
                        <label for="User">User_name</label>
                        <input type="text" id="23" name="name" value="{{$a->name}}" >
                    </div>
                    <div class="input-box">
                        <label for="Email">Email</label>
                        <input type="email" id="24"  name="email" value="{{$a->email}}" >
                    </div>
                  
                </div>
            
   
                <div class="up" >
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Update">
                </div>
                
    

        </div>
        <div class="card">
            <div class="picture">
                <label for="file"><a >
                    <label for="file"><i class ="fa-solid fa-pen"></i></label>
                          <input
                          style="display:none ; visibility :none"
                              type="file"
                              
                              name="file"
                              id="file"
                              class="hidden"/>
      
                      </a></label>
                <img src="{{url($a->image_path)}}" alt="">

                

                <div>{{$a->first_name.' '.$a->last_name}}</div>
                @endforeach
            </form>
            </div>
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
                            <i class="fa-solid fa-house-chimney"></i>
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
                        <form id="logout-form" action="{{ route('logout') }}" method = "POST"  >
                        @csrf
                        </form>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>