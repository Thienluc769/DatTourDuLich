<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>vivuvn | manager login</title>

    <link rel="shortcut icon" href="{{ asset('admin') }}/ass/images/fav.jpg">
    <link rel="stylesheet" href="{{ asset('admin') }}/ass/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/ass/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/ass/css/style.css" />
</head>

<body>
    <div class="container-fluid ">

        <div class=" no-pdding login-box">
            <div class="row no-margin w-100 bklmj">
                <div class="col-lg-6 col-md-6 log-det">

                    <h2>Login</h2>

                    <form action="{{ route('user-postLogin') }}" method="POST">
                        @csrf
                        <div class="text-box-cont">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                    name="username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" aria-label="Username"
                                    name="password" aria-describedby="basic-addon1">
                            </div>

                            <div class="row no-margin">
                                <p class="forget-p">Forget Password ?</p>
                            </div>

                            <div class="right-bkij mb-3">
                                <button type="submit" class="btn btn-success btn-round">sign In</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="col-lg-6 col-md-6 box-de">
                    <div class="ditk-inf">
                        <h2 class="w-100">Welcome Back </h2>
                        <p>Simply Create your account by <br> clicking the Signup Button</p>
                        <button type="button" class="btn btn-outline-light">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="{{ asset('admin') }}/ass/js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('admin') }}/ass/js/popper.min.js"></script>
<script src="{{ asset('admin') }}/ass/js/bootstrap.min.js"></script>
<script src="{{ asset('admin') }}/ass/js/script.js"></script>


</html>
