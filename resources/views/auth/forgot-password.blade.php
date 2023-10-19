<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Forget Password</title>
        <link rel="stylesheet" href="{{url('css/login.css')}}">
        <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header> <!----------------------HEADER------------------------>
            <a href="/" class="logo_admin">OBLOG</a>
            <div class="cust_data">
            </div>
        </header>
        <section>
            <div class="flex">
                <h2>Forget Password</h2>

                  @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                          </div>
                      <br>
                  @endif

                <div class="forget">

                         <form method="POST" class="user" action="{{ route('password.request') }}">
                          @csrf
                        <div>
                            <label for="31">Email address</label>
                            <input type="email" id="email" name="email"  placeholder="email" required>
                               @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                @enderror
                        </div>
                        <div>
                              <input name="reset" id="reset" class="btn btn-primary btn-user btn-block" type="submit" value="reset">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- -------footer--------------->
       
    </body>
</html>
