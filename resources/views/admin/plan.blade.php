<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <meta charset="UTF-8">
        <title>ADMIN USERS </title>
        <link rel="stylesheet" href="{{ url('css/admin/plan.css') }}">
        <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>

    </head>
    <body>
        

        <header> <!----------------------HEADER------------------------>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">logout</a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method = "POST" >
            @csrf
            </form>
            <a href="/" class="logo_admin">o blog</a>
        </header>
<!---------------------------------------------------->
        
<!-- ---------------------------sidebar--------------------- -->
<div class="sidebar">
    <ul>
        <li>
            <div class="status">
                <a href="{{ route('admin.status') }}">
                    <i class="fas fa-chart-bar"></i>
                    <div>Status</div>
                </a>
            </div>
        </li>
        <li class="list-of-post">
            <a href="{{ route('admin.posts') }}">
                <i class="fas fa-th-large"></i>
                <div>list of posts</div>
            </a>
        </li>
        <li class="user-data">
            <a href="{{ route('admin.user') }}">
                <i class="fas fa-barcode"></i>
                <div>user data</div>
            </a>
        </li>
        
        
    </ul>
</div>
<!-- ----------------sidebar--------------------->
<form class="form0" method="POST" action="{{ route('admin.plan') }}">
    @csrf
    @if (session()->get('flage')==1)
                @foreach(session()->get('datas') as $dataz)
    price:  
    <input type="int" name="price" size="20" value="{{ $dataz->price }}">
    no. of posts:  
    <input type="int" name="no_of_post" size="20" value="{{ $dataz->no_of_post }}">
    <input class="styled"
    type="submit"
    name="submit"
    value="Save">
    @endforeach
    @else
 price:
 <script>
    function myFunction() {
      document.getElementById("select").required = true;
    }
    </script>  
    <input type="int" name="price" size="20" >
    no. of posts:  
    <input type="int" name="no_of_post" size="20">
    <input class="styled"
    type="submit"
    name="submit"
    value="Edit"> 
@endif
<div class="plan">
    <h2> Our Plans </h2>
</div>


<div class="main">
    <table>
        <tr>
        <th>  @error('radio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror</th> 
        <th>plan</th>
        <th>price</th>
        <th>no. of posts</th>
        </tr>
        @foreach ($data as $s )
    <tr>    
    <td>   
            <div>
            <input type="radio" id="select" name="radio" value="{{ $s->id }} ">
          
            <label for="select"></label>
            </div>
        </td>
        <td>{{ $s->name }}</td>
        <td>{{ $s->price }} $</td>
        <td>{{ $s->no_of_post }}</td>
    </tr>
    @endforeach
    </table>
</div>


        
    
</form> 
</body>
</html>