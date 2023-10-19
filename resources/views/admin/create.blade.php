<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ url('css/admin/new_post.css') }}>
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>new post</title>
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
        <a href="/" class="logo_admin">o blog</a>
    </header>
    <!----------------------------------------------------------->
    
    <!-- ----------------------------------------------------- -->
    <div class="main">
        <div class="content">

            
            <div>
                <form action="{{ route('admin.addposts') }}" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="post">
                <textarea type="text" name="title" class="input" placeholder="Title" v-model="newItem" @keyup.enter="addItem()"
                rows="1" cols="40" required></textarea>

                <select name="category" id="category"  style="color: white text-color:black width:300px" >
                    <option  value ="New Anime"> New Anime  </option>
                    <option  value ="Movies"> Movies        </option>
                    <option  value ="Manga">Manga           </option>
                </select>                     

                <textarea type="text" name="description" class="input" placeholder="What's on your mind" v-model="newItem" @keyup.enter="addItem()"
                rows="10" cols="40" required></textarea>
            </div>

            <div class="centerbuttom" >

                <input type="submit" v-on:click="addItem()"  class='primaryContained float-right' value="POST" >
                
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rouned-lg shadow-lg traching-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">

                    </span>
                </label>

            </div> 
                                                 

            <div class="bg-grey-lighter pt-15" style="color:white">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer"  style="font-size: 20px">
                    <span class="mt-2 text-base leading-normal">
                        Select
                    </span>
                    <input  style="font-size: 20px"
                        type="file"
                        name="file"
                        id="file"
                        class="hidden"
                        required>
                        
                </label>
            </div>
             </form>
            </div>
   
        </div>
    </div>

    
    
            
</body>

</html>