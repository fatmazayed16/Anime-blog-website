<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pic.css">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profile</title>
</head>

<body>
    <header> <!----------------------HEADER------------------------>
        <div class="cust_data">
            
        </div>
        <a href="/" dir="rtl" class="logo_admin">o blog</a>
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
            <div class="profile-images-card">
                <div class="custom-file">
                    <label for="fileupload">
                        <div class="profile-images">
                        <img src="image/user.png" id="upload-img">
                        </div>
                    </label>
                    <input type="file" id="fileupload">
                </div>
            </div>
            <div class="up" >
                <input type="submit" value="Update">
            </div>
        </div>
        <div class="card">
            <div class="picture">
                <a href="#">
                    <i class="fa-solid fa-pen"></i>
                    
                </a>
                <img src="{{url('image/user.png')}}" alt="">
                <div>User name</div>
            </div>
            <div class="list">
                <ul>
                    <li>
                        <a href="/">
                            <div>Home</div>
                            <i class="fa-solid fa-house-chimney"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>Edit Profile</div>
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>Edit Password</div>
                            <i class="fa-solid fa-key"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>Archives</div>
                            <i class="fa-solid fa-box-archive"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.comments') }}">
                            <div>My Comments</div>
                            <i class="fa-solid fa-comments"></i>
                        </a>
                    </li>
                    <li>
                        <a href=""></a>
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

    <script src="js/jquery-latest.min.js"></script>
    <script>
        $(function(){
            $("#fileupload").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#upload-img").attr("src",x);
                console.log(event);
            });
        })
    </script>

</body>

</html>