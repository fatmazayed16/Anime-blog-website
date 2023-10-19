<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <meta charset="UTF-8">
        <title>ADMIN</title>
        <link rel="stylesheet" href="{{ url('css/admin/admin.css') }}">
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
            <li class="status">
                <a href="{{ route('admin.status') }}">
                    <i class="fas fa-chart-bar"></i>
                    <div>status</div>
                </a>
            </li>
            <li class="list-of-post">
                <a>
                    <i class="fas fa-th-large"></i>
                    <div>list of posts</div>
                </a>
            </li>
            <li class="user-data">
                <a href="{{ route('admin.user') }}">
                    <i class="fas fa-hand-holding-usd"></i>
                    <div>user data</div>
                </a>
            </li>
            {{-- <li class="premium-plan">
                <a href="{{ route('admin.plan') }}">
                    <i class="fas fa-dollar-sign"></i>
                    <div>premium plan</div>
                </a>
            </li> --}}
            
        </ul>
    </div>
<!------------------sidebar--------------------->
<form class="form0 new"  method="post" action="{{ route('admin.posts') }}">
    @csrf
<input class="favorite styled" 
type="submit"
name ="submit"
value="Add">
</form>
    <form class="form0 " method="post" action="{{ route('admin.posts') }}">
      @csrf
        <input class="favorite styled"
        type="submit"
        name ="submit"
        value="View">

    <div class="main">
        <table class="table-sortable"> 
        <thead>
            <tr>
            <th> </th> 
            <th>Id</th>
            <th>User id</th>
            <th>Title</th>
            <th>image path</th>
            <th>category</th>
            <th>status</th>
            <th>pined</th>
            <th>No.of Comments</th>
            <th>views</th>
            <th>Created_By</th>
            <th>Created_At</th>
            </tr>
        <tr>
        </thead> 
        
        <tbody>
            @foreach ($data as $a )
        <td>   
                <div>
                <input type="radio" id="select" name="radio" value="{{ $a->id }}" required>
                </div>
            </td>
            <td>{{ $a->id }}</td>
            <td>{{ $a->user_id }}</td>
            <td>{{ $a->title }}</td>
            <td>{{ $a->image_path }}</td>
            <td>{{ $a->category }}</td>
            <td>{{ $a->status }}</td>
            <td>{{ $a->pined }}</td>
            <td>{{ $a->no_of_comment }}</td>
            <td>{{ $a->views }}</td>
            <td>{{ $a->created_at }}</td>
            <td>{{ $a->updated_at }}</td>
        </tr> 
        @endforeach
    </form>
        </tbody>
        </table>

    </div>


    <script src="{{ url('js/tablesort.js') }}"></script>
    
        
</body>
</html>