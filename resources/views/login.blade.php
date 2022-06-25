<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('twbs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('assets/css/bootstrap/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('assets/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

    <title>Book-U - Login Page</title>
</head>
<body>
    <div class="d-md-flex half">
        <div class="bg" style="background-image: url({{ url('login-background.jpg') }})"></div>
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        @if(session('error'))
                            <h2 class="alert alert-danger">
                                <b>Oops..</b> {{ session('error') }}
                            </h2>
                        @endif
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3> Login to <strong>Book-U</strong></h3>
                            </div>
                            <form action="{{ route('actionLogin') }}" method="POST">
                                @csrf
                                <div class="form-group first">
                                    <label for="username"> Email </label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Your email" required>
                                </div>
                                <div class="form-group last-mb-3">
                                    <label for="username"> Password </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Your password" required>
                                </div>

                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked>
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ms-auto"><a href="#" class="forgot-pass"> Forgot Password </a></span>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap/bootsstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/js/main.js') }}"></script>
</html>