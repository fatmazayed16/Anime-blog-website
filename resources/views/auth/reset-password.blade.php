<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Reset Password</title>
        <link rel="stylesheet" href="{{url('css/login.css')}}">
        <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <header> <!----------------------HEADER------------------------>
            <a href="/" class="logo_admin">BCPWAY</a>
            <div class="cust_data">
            </div>
        </header>

        <section>
            <div class="flex">
                <h2>Reset password</h2>
                <div class="reset">

                        <form method="POST" class="user" action="{{ route('password.update') }}">
                          @csrf
                          <input type="hidden" name="token" value="{{ $request->route('token') }}">
                           <div>
                            <label for="22">Email address</label>
                            <input type="email" id="" name="email" class="form-control is-invalid" value= "{{ $request->email }}" >
                               @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                        </div>
                        <div>
                            <label for="23">New password</label>
                            <input input id="password" type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="password">
                            @error('password')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="24">confirm password</label>
                            <input id="password-confirm" type="password"class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                        </div>



                        <div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Update">
                        </div>


                    </form>
                    <!-- <p class="pr">By clicking the Sign Up, you agree to our <br><a href="#">Terms and Condition</a> and <a href="#">Policy & Privacy</a></p> -->
                </div>

            </div>
        </section>
        <!-- -------footer--------------->
        


    </body>
</html>
