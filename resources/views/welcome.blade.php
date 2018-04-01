    <!-- <!doctype html>
  <html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>
  
    Fonts
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      <style>
          html, body {
              background-color: #fff;
              color: #636b6f;
              font-family: 'Raleway', sans-serif;
              font-weight: 100;
              height: 100vh;
              margin: 0;
          }
  
          .full-height {
              height: 100vh;
          }
  
          .flex-center {
              align-items: center;
              display: flex;
              justify-content: center;
          }
  
          .position-ref {
              position: relative;
          }
  
          .top-right {
              position: absolute;
              right: 10px;
              top: 18px;
          }
  
          .content {
              text-align: center;
          }
  
          .title {
              font-size: 84px;
          }
  
          .links > a {
              color: #636b6f;
              padding: 0 25px;
              font-size: 12px;
              font-weight: 600;
              letter-spacing: .1rem;
              text-decoration: none;
              text-transform: uppercase;
          }
  
          .m-b-md {
              margin-bottom: 30px;
          }
      </style>
  </head>
  <body>
      <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
              <div class="top-right links">
                  @auth
                      <a href="{{ url('/home') }}">Home</a>
                  @else
                      <a href="{{ route('login') }}">Login</a>
                      <a href="{{ route('register') }}">Register</a>
                  @endauth
              </div>
          @endif
  
          <div class="content">
              <div class="title m-b-md">
                  Laravel
              </div>
  
              <div class="links">
                  <a href="https://laravel.com/docs">Documentation</a>
                  <a href="https://laracasts.com">Laracasts</a>
                  <a href="https://laravel-news.com">News</a>
                  <a href="https://forge.laravel.com">Forge</a>
                  <a href="https://github.com/laravel/laravel">GitHub</a>
              </div>
          </div>
      </div>
  </body>
  </html>
   -->




<!-- 
my page
 -->

@extends('layouts.app')


@section('content') 
<div data-role="page" >
       <div data-role="header">
           <h2>Login</h2>
           <a href="{{url('register')}}" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-user">Registor</a>
       </div>


 
      
    <div class="login_container">
           <form method="POST" action="{{ route('login') }}">
            @csrf

           
                 <div class="input_fields">
<!-- gmail -->
                        <label for="email" class="ui-hidden-accessible">E-Mail Addres</label>
                        <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        
                         @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif


        <!-- password -->           


                        <label for="password" class="ui-hidden-accessible">Password</label>
                        <input id="password" type="password" placeholder="Password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                </div>



                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
                




                <button type="submit" class="btn btn-primary">
                    Login
                </button>


                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>


            </form>
  

@endsection