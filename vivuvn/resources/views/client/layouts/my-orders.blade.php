@extends('client.parentLayouts.main')
@section('title', 'vivuvn | đơn hàng của tôi')
@section('main_content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('client/assets') }}/all.css" />
    </head>

    <body>
        <div class="container-account">
            <!-- Menu bên trái -->
            <div class="left-menu-account">
                <div class="container-left-menu-account">
                    <div class="header-menu-account">
                        <span class="avatar-client">TR</span>
                        <div class="right-name-client">
                            <h4></h4>
                            <p>Thành viên đồng (<b>0</b>)</p>
                        </div>
                    </div>
                    <div class="left-account-menu-list">
                        <ul>
                            <li>
                                <a href="{{ route('client-profile', Auth::guard('users')->user()->id) }}"><i
                                        class="fa fa-user"></i> Hồ sơ cá nhân</a>
                                <div class="menu-divider"></div>
                            </li>
                            <li class="acc-active">
                                <a href="{{ route('client-orders', Auth::guard('users')->user()->id) }}"><i
                                        class="fa-solid fa-clipboard-list"></i> Đơn hàng của
                                    tôi</a>
                                <div class="menu-divider"></div>
                            </li>
                            <li>
                                <a href="#" onclick="confirmLogout()"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Nội dung bên phải -->
            <div class="right-content-account-page">
                <div class="container-orders">
                    <h1>Đơn hàng của tôi</h1>
                    <div class="orders-list">
                        @if ($orders->isEmpty())
                            <p>Chưa có đơn nào.</p>
                        @else
                            @foreach ($orders as $order)
                            {{-- {{dd($orders)}} --}}
                                <div class="order-item">
                                    <div class="order-image">
                                        <img src="{{ asset('storage/products') }}/{{ $order->tour->images->first()->name }}" alt="">
                                    </div>
                                    <div class="order-info">
                                        <h3>{{ $order->tour->name }}</h3>
                                        <p class="order-id">Mã đơn hàng: {{ $order->order->id }}</p>
                                        <p class="order-date">Ngày khởi hành: {{ $order->order->booking_date }}</p>
                                        <p class="order-price">Giá: {{ number_format($order->order->total_price) }}₫</p>
                                        <p class="order-price">Hướng dẫn viên:
                                            {{ optional($order->order->tourGuide)->name}}
                                        </p>
                                        <span class="order-status ">
                                            {{ $order->order->payment_method->method }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('client/assets') }}/all.js"></script>
        <script>
            function confirmLogout() {
                if (confirm('Bạn có chắc chắn muốn đăng xuất?')) {
                    window.location.href = '{{ route('client-logout') }}';
                }
            }
        </script>
    </body>

    <style>
        .container-orders {
            padding: 2rem;
        }

        .orders-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .order-item {
            display: flex;
            gap: 2rem;
            padding: 1.5rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .order-image img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .order-info {
            flex: 1;
        }

        .order-info h3 {
            margin: 0 0 1rem;
            color: #333;
        }

        .order-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .order-status.đã-xác-nhận {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .order-status.chờ-xác-nhận {
            background: #fff3e0;
            color: #ef6c00;
        }
    </style>

@endsection
