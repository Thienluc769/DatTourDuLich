@extends('client.parentLayouts.master')
@section('title', 'vivuvn | trang chủ')
@section('main_content')
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="section-title text-center mb-3">
                        Dịch vụ của chúng tôi
                    </h2>
                    <p>
                        Với sứ mạng “Khách hàng là trên hết” Chúng tôi luôn mong muốn có
                        cơ hội được đồng hành và phục vụ khách hàng bằng tất cả trách
                        nhiệm và danh dự của mình. Bên cạnh đó chúng tôi cũng không ngừng
                        lắng nghe, học hỏi kinh nghiệm để ngày một đáp ứng yêu cầu tốt hơn
                        của quý khách hàng, cũng như những giá trị tốt đẹp hơn cho cộng
                        đồng.
                    </p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-lg-4 order-lg-1">
                    <div class="h-100">
                        <div class="frame h-100">
                            <div class="feature-img-bg h-100" style="background-image: url('assetss/images/PhuQuoc.png')">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-house display-4 text-primary"></span>
                            <h3>Chung cư đẹp</h3>
                            <p class="mb-0">
                                Không chỉ đẹp về mặt thẩm mỹ mà còn đáp ứng các tiêu chuẩn về
                                chức năng, tiện ích và chất lượng cuộc sống.
                            </p>
                        </div>
                    </div>

                    <div class="feature-1">
                        <div class="align-self-center">
                            <span class="flaticon-restaurant display-4 text-primary"></span>
                            <h3>Nhà hàng & Cà phê</h3>
                            <p class="mb-0">
                                Cung cấp dịch vụ ăn uống cho khách hàng. Các nhà hàng có thể
                                phục vụ nhiều loại món ăn, thức uống khác nhau, từ món Việt
                                Nam đến món quốc tế.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">
                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-mail display-4 text-primary"></span>
                            <h3>Dễ dàng kết nối</h3>
                            <p class="mb-0">
                                Tối ưu hóa trải nghiệm người dùng, giúp khách hàng dễ dàng
                                truy cập và sử dụng thông tin trên trang web.
                            </p>
                        </div>
                    </div>

                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-phone-call display-4 text-primary"></span>
                            <h3>Hỗ trợ 24/7</h3>
                            <p class="mb-0">
                                Cung cấp dịch vụ hỗ trợ khách hàng qua nhiều kênh khác nhau cả
                                ngày trong tuần.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('registration') === 'success') {
                Swal.fire({
                    title: 'Đăng ký thành công!',
                    text: 'Tài khoản doanh nghiệp đang chờ xét duyệt, hãy chờ phản hồi từ email của chúng tôi',
                    text: 'Xin cám ơn.'
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
    
                // Xóa query parameter khỏi URL
                const newUrl = window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            }
        });
    </script>
@endsection
