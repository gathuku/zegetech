<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exam | register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="{{route('register-submit')}}" method="post">
      @csrf
      @include('flash::message')
          @if($errors->any())
           <div class="alert alert-danger" role="alert">

               @foreach($errors->all() as $error)
               <li>{{$error}}</li>
               @endforeach
           </div>
          @endif
        <div class="card">
            <div class="card-header">
                <h2 class="mb-2 ">ZEGETECH</h2>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input  class="form-control form-control-lg" type="text" name="name" required="" placeholder="Full name" >
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" a>
                </div>
                <div class="form-group">
                    <input  class="form-control form-control-lg" type="text" name="phone" required="" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1"  name="password"type="password" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" required="" name="password_confirmation" placeholder="Confirm">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
                <div class="form-group row pt-0">


                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="{{route('login')}}" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>


</html>
