<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <meta charset="UTF-8">
        <title>ADMIN USERS </title>
        <link rel="stylesheet" href="{{ url('css/adminx.css') }}">
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
        <li class="user-data">
            <a href="{{ route('admin.status') }}">
                <i class="fas fa-hand-holding-usd"></i>
                <div>status</div>
            </a>
        </li>
        <li class="status">
            <a href="{{ route('admin.posts') }}">
                <i class="fas fa-chart-bar"></i>
                <div>list of posts</div>
            </a>
        </li>
        <li class="list-of-post">
            <a >
                <i class="fas fa-th-large"></i>
                <div>user data</div>
            </a>
        </li>
        
        
    </ul>
</div>
<!-- ----------------sidebar--------------------->


    <form class="form0" method="POST" action="{{ route('admin.user') }}">
        @csrf
        <input class="favorite styled"
        type="test"
        name = "message"
        placeholder="message"
        >
        <input class="favorite styled"
        type="submit"
        name = "submit"
        value="Send">
        <input class="favorite styled"
        type="submit"
        name = "submit"
        value="Delete">
        <input class="favorite styled"
        type="submit"
        name = "submit"
        value="Premium">
    <div class="main">
        <table>
            <tr>
            <th></th> 
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>status</th>
            <th>created_at</th>
            <th>updated_at</th>
            </tr>
            @foreach ( $data as $a )
        <tr>    
        <td>   
                <div>
                <input type="radio" id="select" name="radio" value="{{ $a->id }}">
                <label for="select"></label>
                </div>
            </td>
            <td>{{ $a->id }}</td>
            <td>{{ $a->name }} </td>
            <td>{{ $a->email }} </td>
            <td>{{ $a->status }} </td>
            <td>{{ $a->created_at }} </td>
            <td>{{ $a->updated_at }} </td>
        </tr> 
        @endforeach       
        </table>

    </div>
</form>     
</body>
</html>