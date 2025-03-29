@extends('client.parentLayouts.main')
@section('title', 'vivuvn | Giới thiệu')
@section('main_content')
@section('content_name', 'Giới Thiệu')


<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="owl-single dots-absolute owl-carousel">
                    <img src="assetss/images/slider-1.jpg" alt="Free HTML Template by Untree.co"
                        class="img-fluid rounded-20" />
                    <img src="assetss/images/slider-2.jpg" alt="Free HTML Template by Untree.co"
                        class="img-fluid rounded-20" />
                    <img src="assetss/images/slider-3.jpg" alt="Free HTML Template by Untree.co"
                        class="img-fluid rounded-20" />
                    <img src="assetss/images/slider-4.jpg" alt="Free HTML Template by Untree.co"
                        class="img-fluid rounded-20" />
                    <img src="assetss/images/slider-5.jpg" alt="Free HTML Template by Untree.co"
                        class="img-fluid rounded-20" />
                </div>
            </div>
            <div class="col-lg-5 pl-lg-5 ml-auto">
                <h2 class="section-title mb-4">Về chuyến đi</h2>
                <p>
                    Không chỉ đơn thuần là một chuyến du lịch, chúng tôi mang đến cho
                    bạn trải nghiệm trọn vẹn với đầy đủ các dịch vụ cần thiết, đảm bảo
                    sự hài lòng và thoải mái tối đa cho quý khách.
                </p>
                <ul class="list-unstyled two-col clearfix">
                    <li>Hoạt động ngoài trời.</li>
                    <li>Hãng hàng không.</li>
                    <li>Cho thuê ô tô.</li>
                    <li>Đường thủy.</li>
                    <li>Khách sạn.</li>
                    <li>Đường sắt.</li>
                    <li>Bảo hiểm du lịch.</li>
                    <li>Gói du lịch.</li>
                    <li>Bảo hiểm cá nhân.</li>
                    <li>Hướng dẫn viên.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- <div class="untree_co-section testimonial-section mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <h2 class="section-title text-center mb-5">Testimonials</h2>

                <div class="owl-single owl-carousel no-nav">
                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="assetss/images/person_2.jpg" alt="Image" class="img-fluid" />
                        </figure>
                        <h3 class="name">Adam Aderson</h3>
                        <blockquote>
                            <p>
                                &ldquo;There live the blind texts. Separated they live in
                                Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;
                            </p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="assetss/images/person_3.jpg" alt="Image" class="img-fluid" />
                        </figure>
                        <h3 class="name">Lukas Devlin</h3>
                        <blockquote>
                            <p>
                                &ldquo;There live the blind texts. Separated they live in
                                Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;
                            </p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="assetss/images/person_4.jpg" alt="Image" class="img-fluid" />
                        </figure>
                        <h3 class="name">Kayla Bryant</h3>
                        <blockquote>
                            <p>
                                &ldquo;There live the blind texts. Separated they live in
                                Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="untree_co-section">
    <div class="container">
        <div class="col-lg-5">
            <figure class="img-play-video">
                <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=MVrwPSTW5Vo"
                    data-fancybox>
                    <span></span>
                </a>
                <img src="assetss/images/PhuQuoc.png" alt="Image" class="img-fluid rounded-20" />
            </figure>
        </div>

        <div class="col-lg-5">
            <h2 class="section-title text-left mb-4">
                Hãy xem video chuyến tham quan
            </h2>
            <p><a href="#" class="btn btn-primary">Bắt đầu ngay</a></p>
        </div>
    </div>
</div>

<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">
                    Liên hệ với chúng tôi để có những trải nghiệm tốt nhất.
                </h2>
                <p class="mb-0">
                    <a href="{{route('client-contact')}}" class="btn btn-outline-white text-white btn-md font-weight-bold">Liên hệ</a>
                </p>
            </div>
        </div>
    </div>
</div>


@endsection
