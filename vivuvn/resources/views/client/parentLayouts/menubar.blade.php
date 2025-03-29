<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <a href="{{ route('client-home') }}" class="logo m-0">Vivuvn<span class="text-primary"></span></a>
            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li class="active"><a href="{{ route('client-home') }}">Trang chủ</a></li>
                <li class="has-children">
                    <a href="#">Tour du lịch</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('client-tourList') }}">Trong nước</a></li>
                        <li><a href="#">Quốc tế</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('client-services') }}">Dịch vụ</a></li>
                <li><a href="{{ route('client-about') }}">Giới thiệu</a></li>
                <li><a href="{{ route('client-contact') }}">Liên hệ</a></li>
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="has-children">
                        <a href="#">Tài khoản</a>
                        @if (Auth::guard('users')->check())
                            <ul class="dropdown">
                                <li><a href="{{ route('client-profile', Auth::guard('users')->user()->id) }}">Hồ sơ của
                                        tôi</a></li>
                                <li><a href="{{ route('client-logout') }}">Đăng xuất</a></li>
                        @else
                            <ul class="dropdown auth-dropdown">
                                <li>
                                    <a style="height:52px" class="login-btn" href="{{ route('client-login') }}">Đăng nhập</a>
                                </li>
                                <li style="margin:5px 0 -10px 0;font-size: 11px ; width:120%; padding-left:15px">Bạn chưa có tài khoản?
                                    <a style="display: inline-block; margin-left:-20px; padding-right:0; font-size:14px; color:red"
                                        href="{{ route('client-register') }}">Đăng ký</a>
                                    ngay
                                </li>
                            </ul>
                        @endif
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>

<style>
    .auth-dropdown {
        position: absolute !important;
        right: 0 !important;
        left: auto !important;
        transform: translateX(30%) !important;
        padding: 15px 25px !important;
        background: #fff !important;
        border-radius: 12px !important;
        min-width: 280px !important;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1) !important;
        border: 1px solid rgba(0, 0, 0, 0.08) !important;
        margin-top: 10px !important;
    }

    .login-btn {
        display: block !important;
        width: 100% !important;
        background: #20B2AA !important;
        color: #ffffff !important;
        padding: 16px 20px !important;
        border-radius: 8px !important;
        text-align: center !important;
        font-weight: 500 !important;
        font-size: 16px !important;
        transition: all 0.3s ease !important;
        border: none !important;
        box-shadow: 0 2px 8px rgba(32, 178, 170, 0.3) !important;
    }

    .register-text {
        margin: 12px 0 0 0 !important;
        font-size: 13px !important;
        text-align: center !important;
        color: #666 !important;
        white-space: nowrap !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 4px !important;
    }

    .register-link {
        color: #ff4444 !important;
        text-decoration: none !important;
        font-size: 13px !important;
        font-weight: 500 !important;
    }

    .register-link:hover {
        text-decoration: underline !important;
    }

    /* Animation cho dropdown */
    .dropdown {
        animation: fadeInDown 0.2s ease;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Thêm position relative cho parent */
    .has-children {
        position: relative !important;
    }
</style>