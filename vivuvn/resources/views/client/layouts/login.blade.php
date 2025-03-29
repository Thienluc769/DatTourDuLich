@extends('client.parentLayouts.main')
@section('title', 'vivuvn | Đăng nhập')
@section('main_content')
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('client/asset') }}/fonts/icomoon/style.css">

        <link rel="stylesheet" href="{{ asset('client/asset') }}/css/owl.carousel.min.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('client/asset') }}/css/bootstrap.min.css">

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('client/asset') }}/css/style.css">

        <title>vivuvn | Đăng nhập</title>
    </head>

    <body>
        <div class="content" style="padding: 3rem 0 10rem 0;">
            <div class="container">
                @if ($errors->any())
                    <div style="color: red ; font-size:20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div align="center">
                    {{-- <div class="col-md-6">
                    <img src="{{ asset('client/asset') }}/images/logoweb.png" alt="Image" class="img-fluid">
                </div> --}}
                    <div class="contents">
                        <div class="row justify-content-center">
                            <div class="">
                                <div>
                                    <h3 style="font-weight:bold; color:#0a3c62">Đăng nhập</h3>
                                </div>
                                <form action="{{ route('client-postLogin') }}" method="POST">
                                    @csrf
                                    <div class="form-group first" style="margin-bottom: 10px; width: 450px; clear:both;">
                                        <label for="username">Email</label>
                                        <input type="text" class="form-control" name="email">

                                    </div>
                                    <div class="form-group first" style="margin-bottom: 10px; width: 450px; clear:both;">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" class="form-control" name="pass">

                                    </div>



                                    <input style="width: 450px;" type="submit" value="Đăng nhập" class="btn btn-block btn-primary">
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Quên mật khẩu?</a></span>
                                    <span class="ml-auto"><a style="margin-left: 290px"
                                            href="{{ route('client-register') }}" class="forgot-pass">Đăng
                                            ký</a></span>

                                    {{-- <a href="{{ route('client-register') }}" class="d-block text-left my-4 text-muted">Đăng
                                    ký
                                </a> --}}

                                    {{-- <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

                                <div class="social-login">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div> --}}
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <script src="{{ asset('client/asset') }}/js/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('client/asset') }}/js/popper.min.js"></script>
        <script src="{{ asset('client/asset') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('client/asset') }}/js/main.js"></script>
    </body>

    </html>
@endsection
