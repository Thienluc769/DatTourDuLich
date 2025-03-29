<div class="footer-wrapper">
    <div class="site-footer">
        <div class="enterprise-banner">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 text-center">
                        <h4 class="mb-0">Bạn là chủ doanh nghiệp du lịch?</h4>
                        <p class="mb-0">Đăng ký để quảng bá dịch vụ của bạn trên nền tảng của chúng tôi</p>
                    </div>
                    <div class="col-md-4 text-center text-md-end">
                        <a href="{{ route('enterprise-regis') }}" class="enterprise-register-btn">Đăng ký Doanh
                            nghiệp</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner first">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">Mạng xã hội</h3>
                        </div>
                        <div class="widget">
                            <ul class="list-unstyled social">
                                <li>
                                    <a href="#"><span class="icon-twitter"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-facebook"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-linkedin"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-dribbble"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-pinterest"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-apple"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-google"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 pl-lg-5">
                    </div>
                    <div class="col-md-6 col-lg-2">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">Liên hệ</h3>
                            <ul class="list-unstyled quick-info links">
                                <li class="email"><a href="#">vivuvn@gmail.com</a></li>
                                <li class="phone"><a href="#">0899900998</a></li>
                                <li class="address">
                                    <a href="#">475A Điện Biên Phủ, P.25, Q.Bình Thạnh, TP.HCM</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .footer-wrapper {
        position: relative !important;
        z-index: 9999 !important;
        width: 100% !important;
        clear: both !important;
        display: block !important;
        pointer-events: auto !important;
    }

    .footer-wrapper * {
        pointer-events: auto !important;
    }

    .site-footer {
        position: relative !important;
        width: 100% !important;
        clear: both !important;
        z-index: 2 !important;
    }

    .enterprise-banner {
        position: relative !important;
        background-color: #f0f8ff !important;
        padding: 25px 0 !important;
        margin-bottom: 30px !important;
        width: 100% !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        z-index: 2 !important;
        clear: both !important;
        float: none !important;
        display: block !important;
    }

    .enterprise-banner::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: inherit !important;
        z-index: -1 !important;
    }

    .enterprise-banner .container {
        max-width: 1140px !important;
        margin-left: auto !important;
        margin-right: auto !important;
        padding-left: 15px !important;
        padding-right: 15px !important;
        float: none !important;
    }

    .enterprise-banner .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
        display: flex !important;
        flex-wrap: wrap !important;
        width: 100% !important;
    }

    .enterprise-banner h4 {
        color: #333 !important;
        font-size: 20px !important;
        margin-bottom: 8px !important;
    }

    .enterprise-banner p {
        color: #666 !important;
        font-size: 15px !important;
    }

    .enterprise-register-btn {
        display: inline-block !important;
        background: #1a374d !important;
        color: white !important;
        padding: 10px 24px !important;
        border-radius: 6px !important;
        font-weight: 500 !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        border: none !important;
    }

    .enterprise-register-btn:hover {
        background: #0b5ed7 !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15) !important;
    }

    @media (max-width: 768px) {
        .enterprise-banner {
            padding: 20px 0 !important;
        }

        .enterprise-banner h4 {
            font-size: 18px !important;
        }

        .enterprise-banner p {
            font-size: 14px !important;
        }

        .enterprise-register-btn {
            margin-top: 15px !important;
        }
    }
</style>
