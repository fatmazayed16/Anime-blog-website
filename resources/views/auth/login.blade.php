<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Join/sign in</title>
        <link rel="stylesheet" href="{{url('css/login.css')}}">
        <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <header> <!----------------------HEADER------------------------>
            <a href="/" class="logo_admin" >O BLOG</a>
        </header>

        <div class="flex">
            <h2>Join / sign in</h2>
            <div class="create">
              <form method="post" class="user" action="{{ route('register') }}">
              @csrf
                    <h3>create account</h3>
                    <div>
                        <label for="22">User name</label>
                        <input id="name" type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                    <div>
                        <label for="23">Frist Name</label>
                        <input id="name" type="text" name="first_name" class="form-control form-control-user @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="Enter your name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                    <div>
                        <label for="24">Last Name</label>
                        <input id="name" type="text" name="last_name" class="form-control form-control-user @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Enter your name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                    <div>
                        <label for="25">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="26">Create password</label>
                        <input id="password" type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="27">confirm password</label>
                        <input id="password-confirm" type="password"class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                   <div class="gender">
                        <label for="28">Gender</label>
                        <input type="radio" id="g-radio" name="gender" value="male">
                        <label for="male">male</label>
                        <input type="radio" id="g-radio" name="gender" value="female">
                        <label for="female">female</label>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                    <div>
                        <input type="submit" class="submit-btn" value="sign up" >
                    </div>
                </form>
            </div>

            <div class="line" style="
                height: 400px;
                background-color: white;
                padding: 1px;
                align-self: center;">
            </div>

            <div class="sign_up">
            <form method="POST" class="user" action="{{ route('login') }}">
                @csrf    
                    <h3>sign in</h3>
                    <div>
                        <label for="31">Email address</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                        <label for="32">password</label>
                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>

                    <div >
                        <a href="/forgot-password">forget password?</a>
                    </div>

                    <div>
                        <input type="submit" value="sign in">
                    </div>                
            </form>
            </div>
        </div>
        <!-- -------footer--------------->
        


    </body>
</html>
