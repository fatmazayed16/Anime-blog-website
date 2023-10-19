<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{ url ( 'css/pass.css' ) }} ">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Password</title>
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
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                   
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                  
            <form method="POST" class="user" action="{{ route('user.update_password') }}">
            @csrf
            
                <div class="info">

                    <div class="input-box">
                        <label for="Current">Current Password</label>
                        <input type="password" id="password"  name="current_password" class="form-control"  required>

                        @if ($errors->has('current_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    
                    <div class="input-box">
                        <label for="21">New Password</label>
                        <input id="new_password" type="password" class="form-control" name="new_password" required>

                        @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif

                    </div>
                    <div class="input-box">
                        <label for="23">Confirm Password</label>
                           <input id="password_confirm" type="password" class="form_control" name="password_confirmation" required>
                        </div>
                </div>
                <div class="up" >
                    <input  type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
            
            @foreach($data as $x)
            </div>
            <div class="card">
            <div class="picture">
               
                <img src="{{url($x->image_path)}}" alt="">
                <div>{{$x->first_name.' '.$x->last_name}}</div>
           
            @endforeach
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