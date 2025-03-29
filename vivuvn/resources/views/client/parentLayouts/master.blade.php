<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="favicon.png" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assetss') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assetss') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('assetss') }}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('assetss') }}/css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('assetss') }}/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="{{ asset('assetss') }}/fonts/flaticon/font/flaticon.css" />
    <link rel="stylesheet" href="{{ asset('assetss') }}/css/daterangepicker.css" />
    {{-- <link rel="stylesheet" href="{{ asset('assetss') }}/css/aos.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assetss') }}/css/style.css" />


    <title>@yield('title')</title>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('client.parentLayouts.menubar')

    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="intro-wrap">
                        <h1 class="mb-5">
                            <span class="d-block">Let's Enjoy Your</span> Trip In
                            <span class="typed-words"></span>
                        </h1>

                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('client-search-tour') }}" class="form" method="GET" style="width: 77%; margin-left: auto;">
                                    <div class="row mb-2">
                                        <div class="col-8">
                                            <input placeholder="điểm đến" name="keyWord" class="form-control">
                                            </input>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">Tìm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="slides">
                        <img src="assetss/images/VinhHaLong.png" alt="Image" class="img-fluid active" />
                        <img src="assetss/images/Dalat.png" alt="Image" class="img-fluid" />
                        <img src="assetss/images/SaPa.png" alt="Image" class="img-fluid" />
                        <img src="assetss/images/DaNang.png" alt="Image" class="img-fluid" />
                        <img src="assetss/images/NhaTrang.png" alt="Image" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('main_content')

    @include('client.parentLayouts.footer')

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('assetss') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assetss') }}/js/popper.min.js"></script>
    <script src="{{ asset('assetss') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assetss') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assetss') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('assetss') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assetss') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('assetss') }}/js/aos.js"></script>
    <script src="{{ asset('assetss') }}/js/moment.min.js"></script>
    <script src="{{ asset('assetss') }}/js/daterangepicker.js"></script>



    <script src="{{ asset('assetss') }}/js/typed.js"></script>
    <script>
        $(function() {
            var slides = $(".slides"),
                images = slides.find("img");

            images.each(function(i) {
                $(this).attr("data-id", i + 1);
            });

            var typed = new Typed(".typed-words", {
                strings: [
                    "Vịnh Hạ Long.",
                    " Đà Lạt.",
                    " SaPa.",
                    " Đà Nẵng.",
                    " Nha Trang.",
                ],
                typeSpeed: 80,
                backSpeed: 80,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
                showCursor: true,
                preStringTyped: (arrayPos, self) => {
                    arrayPos++;
                    console.log(arrayPos);
                    $(".slides img").removeClass("active");
                    $('.slides img[data-id="' + arrayPos + '"]').addClass("active");
                },
            });
        });
    </script>

    <script src="{{ asset('assetss') }}/js/custom.js"></script>
</body>

</html>
