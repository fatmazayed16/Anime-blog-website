<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/style-sht.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>our blog</title>
</head>
<body>
  
        <a href="/" class="logo_admin">o blog</a>
    </header><!---------------------------------------------------->

    <!---------------------------------------------------->
    <div class="content1">
        <div class="plan">
            <h2> Our Plans </h2>
        </div>
        <div class="main">
        <table>
            <tr>
            <th><a>premium</a></th>
            <th><a>basic</a></th>
            </tr>
            <tr>    
            <td>200 $</td>
            <td>0</td>
            </tr> 

            <tr>    
            <td>can make a post</td>
            <td>can not make a post</td>
            </tr> 
        </table>
        </div>

        <form class="up" action="{{route('user.plan')}}" method="POST">
            @csrf
            
            <input type="submit"  class="btn btn-primary btn-user btn-block" name="" value="go premium">
            
        </form>
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