<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
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
    <link rel="stylesheet" href="{{ asset('assetss') }}/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('assetss') }}/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>@yield('title')</title>
</head>

<body>

    @include('client.parentLayouts.menubar')
    {{-- heder --}}
    @include('client.parentLayouts.header')

    @yield('main_content')

    @include('client.parentLayouts.footer')


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
    <script src="{{ asset('assetss') }}/js/custom.js"></script>

</body>

</html>
