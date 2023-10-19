<!DOCTYPE html>
<html lang="en">
{{-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
</head> --}}

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="UTF-8">
    <title>Join/sign in</title>
    <link rel="stylesheet" href="css/verification.css">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>

</head>

<body>
    <section>
    {{-- <div class="hero">
        <div class="form-box">
            <div class="button-box"> --}}
                <div class="flex">
                    <div class="create">
                <div id="btn"></div>
            </div>
            @if(session('status'))
                 <div class="alert alert-success" role="alert">
                        {{ session('status') }}

                 </div>
            @endif
      
             <div class="sign_up">
                    <h3>You must verify your email address, please check your email for a verification link</h3>

                    <form method="POST" class="user" action="{{ route('verification.send') }}">
                          @csrf
                  
                    <input name="login" id="login" type="submit" value="Resend email" class="btn btn-primary btn-user btn-block" >

                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>