<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
</head>
<body> 
   <div class="flex">
            <div class="sign_up">
              <form method="POST" class="user" action="{{ route('admin.login') }}">
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

                    

                    <div>
                        <input type="submit" value="sign in">
                    </div>
                </form>
            </div>
        </div>
</body>
</html>